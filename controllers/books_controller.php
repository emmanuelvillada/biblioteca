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
            echo '' . $e->getMessage();
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $pdo = $this->db->getConnection(); // Get the PDO instance
            $sql = 'UPDATE books SET title = :title, author = :author, author_id = :author_id WHERE id = :id';
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':author', $data['author'], PDO::PARAM_STR);
            $stmt->bindParam(':author_id', $data['author_id'], PDO::PARAM_INT);

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
    public function create (Book $book) {
        try {
            $pdo = $this->db->getConnection();
            $sql = "INSERT INTO book (book_id,book_title,book_author,book_description) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->
        }catch (PDOException $e) {
            echo $e->getMessage();
    }
}
