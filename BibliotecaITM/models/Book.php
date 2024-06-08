<?php

class Book {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db->getPDO();
    }

    public function addBook($title, $author, $isbn, $publisher, $code, $synopsis, $image_path) {
        $stmt = $this->pdo->prepare("INSERT INTO books (title, author, isbn, publisher, code, synopsis, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $author, $isbn, $publisher, $code, $synopsis, $image_path]);
    }

    public function getBooks() {
        $stmt = $this->pdo->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBook($id, $title, $author, $isbn, $publisher, $code, $synopsis, $image_path = null) {
        if ($image_path) {
            $stmt = $this->pdo->prepare("UPDATE books SET title = ?, author = ?, isbn = ?, publisher = ?, code = ?, synopsis = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $author, $isbn, $publisher, $code, $synopsis, $image_path, $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE books SET title = ?, author = ?, isbn = ?, publisher = ?, code = ?, synopsis = ? WHERE id = ?");
            $stmt->execute([$title, $author, $isbn, $publisher, $code, $synopsis, $id]);
        }
    }

    public function deleteBook($id) {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$id]);
    }
    public function getAvailableBooks() {
        $stmt = $this->pdo->query("SELECT * FROM books WHERE status = 'available'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateBookStatus($code, $status) {
        $stmt = $this->pdo->prepare("UPDATE books SET status = ? WHERE code = ?");
        $stmt->execute([$status, $code]);
    }
    
    public function searchBooks($search) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE (title LIKE :search OR code LIKE :search) AND status = 'available'");
        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBookTitleByCode($book_code) {
        $stmt = $this->pdo->prepare("SELECT title FROM books WHERE code = :book_code");
        $stmt->bindParam(':book_code', $book_code);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>
