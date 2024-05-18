<?php
include_once("../db_connection/db_connection.php");
class books_controller
{

    private $db;

    public function __construct()
    {
        $this->db = new db_connection();
    }

    public function get($id)
    {
        try {
            $pdo = $this->db->getConnection(); // Get the PDO instance
            $sql = "SELECT * FROM books WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Error al crear el libro: " . $e->getMessage());
            return false;
        }
    }

    public function update($id,Book $book)
    {
        $errors = $book->validate();
        // Validar los datos del libro
    $errors = $book->validate();
    if (!empty($errors)) {
        throw new Exception("Validation errors: " . implode(", ", $errors));
    }
        try {
            $pdo = $this->db->getConnection(); // Get the PDO instance
            $sql = 'UPDATE books SET title = :title, author = :author, publication_year = :publication_year,
            availability = :availability, editorial = :editorial, genre = :genre  WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $book->__get('title'), PDO::PARAM_STR);
            $stmt->bindParam(':author', $book->__get('author'), PDO::PARAM_STR);
            $stmt->bindParam(':publication_year', $book->__get('publication_year'));
            $stmt->bindParam(':availability', $book->__get('availability'), PDO::PARAM_INT);
            $stmt->bindParam(':editorial', $book->__get('editorial'), PDO::PARAM_INT);
            $stmt->bindParam(':genre', $book->__get('genre'), PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $pdo = $this->db->getConnection();
            $sql = 'DELETE FROM books WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
                //echo "Record deleted successfully";
                //header("Location: index.php");
            } else {
                return false;
                //echo "No record found";
                //header("Location: index.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function create(Book $book)
    {
        $errors = $book->validate();
             // Validar los datos del libro
        $errors = $book->validate();
        if (!empty($errors)) {
            throw new Exception("Validation errors: " . implode(", ", $errors));
        }

        // Si la validación es exitosa, procedemos a la inserción en la base de datos
        try {
            $pdo = $this->db->getConnection();
            $sql = "INSERT INTO book (title, author, publication_year, editorial, genre) VALUES (:title, :author, :publication_year, :editorial, :genre)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $book->__get('title'), PDO::PARAM_STR);  // corrected typo from :tittle to :title
            $stmt->bindParam(':author', $book->__get('author'), PDO::PARAM_STR);
            $stmt->bindParam(':publication_year', $book->__get('publication_year'), PDO::PARAM_INT);
            $stmt->bindParam(':editorial', $book->__get('editorial'), PDO::PARAM_STR);
            $stmt->bindParam(':genre', $book->__get('genre'), PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al crear el libro: " . $e->getMessage());
        }
    }
}
