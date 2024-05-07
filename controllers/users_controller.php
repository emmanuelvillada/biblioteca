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
        $pdo = $this->db_connection->pdo;
        try {
            $query = "INSERT INTO user (user_id,username,password,identity) VALUES ?????";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($user->user_id, $user->username, $user->password, $user->identity));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function update(User $user)
    {
        $pdo = $this->db_connection->pdo;
        $query = "UPDATE user SET username =?, password =?, identity =? WHERE user_id =?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array($user->username, $user->password, $user->identity, $user->user_id));
        return $pdo->lastInsertId();
    }
}
