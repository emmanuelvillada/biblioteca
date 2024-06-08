<?php

require_once '../Database.php';
require_once '../models/Book.php';

class BookController {
    private $db;
    private $bookModel;

    public function __construct() {
        $this->db = new Database();
        $this->bookModel = new Book($this->db);
    }

    public function addBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $isbn = $_POST['isbn'];
            $publisher = $_POST['publisher'];
            $code = $_POST['code'];
            $synopsis = $_POST['synopsis'];
            $image = $_FILES['image'];
    
            // Verifica si se ha subido una imagen y si no hay errores
            if (isset($image) && $image['error'] == 0) {
                $uploadDir = '../img/'; // Cambia esto a la ubicación deseada
                $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
                $newFileName = uniqid('book_') . '.' . $extension;
                $targetPath = $uploadDir . $newFileName;
    
                if (move_uploaded_file($image['tmp_name'], $targetPath)) {
                    // Agrega el libro a la base de datos
                    $this->bookModel->addBook($title, $author, $isbn, $publisher, $code, $synopsis, $targetPath);
                    header("Location: /BibliotecaITM/public/index.php?controller=BookController&action=listBooks");
                } else {
                    // Maneja el error si no se puede mover el archivo
                    echo "Error al subir la imagen.";
                }
            } else {
                // Maneja el error si no se ha subido ninguna imagen
                echo "La imagen es obligatoria.";
            }
        } else {
            require '../views/addBook.php';
        }
    }

    public function listBooks() {
        $books = $this->bookModel->getBooks();
        require '../views/listBooks.php';
    }

    public function editBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $isbn = $_POST['isbn'];
            $publisher = $_POST['publisher'];
            $code = $_POST['code'];
            $synopsis = $_POST['synopsis'];
            $image = $_FILES['image'];

            if ($image['size'] > 0) {
                // Handle file upload
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($image["name"]);
                move_uploaded_file($image["tmp_name"], $target_file);

                $this->bookModel->updateBook($id, $title, $author, $isbn, $publisher, $code, $synopsis, $target_file);
            } else {
                $this->bookModel->updateBook($id, $title, $author, $isbn, $publisher, $code, $synopsis);
            }

            header("Location: /BibliotecaITM/public/index.php?controller=BookController&action=listBooks");
        } else {
            $id = $_GET['id'];
            $book = $this->bookModel->getBookById($id);
            require '../views/editBook.php';
        }
    }

    public function deleteBook() {
        $id = $_GET['id'];
        $this->bookModel->deleteBook($id);
        header("Location: /BibliotecaITM/public/index.php?controller=BookController&action=listBooks");
    }

}
?>
