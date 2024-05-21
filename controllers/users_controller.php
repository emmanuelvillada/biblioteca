<?php
include_once '../models/User.php';
include_once '../db_connection/db_connection.php';
class user_controller
{
    private $db_connection;

    public function __construct()
    {
        $db_connection =  new db_connection();
    }
    public function create(User $user)
    {
        $pdo = $this->db_connection->getConnection();
        try {
            $query = "INSERT INTO user (name,lastname,password,email,rol) VALUES (:name,:lastname,:password,:email,:rol)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $user->__get('name'));
            $stmt->bindParam(':lastname', $user->__get('lastname'));
            $stmt->bindParam(':password', $user->__get('password'));
            $stmt->bindParam(':email', $user->__get('email'));
            $stmt->bindParam(':rol', $user->__get('rol'));
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function update(User $user)
    {
        try {
            $pdo = $this->db_connection->pdo;
            $query = "UPDATE user SET name = :name, lastname = :lastname, password =:password, email = :email, rol = :rol WHERE id =:id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $user->__get('name'));
            $stmt->bindParam(':lastname', $user->__get('lastname'));
            $stmt->bindParam(':password', $user->__get('password'));
            $stmt->bindParam(':email', $user->__get('email'));
            $stmt->bindParam(':rol', $user->__get('rol'));
            $stmt->bindParam(':id', $user->__get('id'));
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function get($name)
    {
        try {
            $pdo = $this->db_connection->pdo;
            $query = "SELECT * FROM user where name = :name";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
}
