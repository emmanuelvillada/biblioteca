<?php

class User {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db->getPDO();
    }

    public function register($name, $surname, $document_number, $birth_date, $password, $role = 'user') {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, surname, document_number, birth_date, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $surname, $document_number, $birth_date, $password, $role]);
    }

    public function login($document_number, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE document_number = ?");
        $stmt->execute([$document_number]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    
    }
    public function updateUser($id, $name, $surname, $document_number, $birth_date, $password) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, surname = ?, document_number = ?, birth_date = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $surname, $document_number, $birth_date, $password, $id]);
    }
    
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserNameByDocumentNumber($document_number) {
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE document_number = :document_number");
        $stmt->bindParam(':document_number', $document_number);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
}
?>
