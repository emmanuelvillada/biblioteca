<?php
include_once("../db_connection/db_connection.php");
include_once '../models/Loan.php';
class loan_controller
{

    private $db;

    public function __construct()
    {
        $this->db = new db_connection();
    }

    public function create(Loan $loan)
    {
        try {
            $pdo = $this->db->getConnection();
            $pdo->beginTransaction();
            $sql = "INSERT INTO prestamo VALUES (:id, :)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($loan->__get("username"), $loan->__get("password")));
        } catch (PDOException $e) {
            echo "" . $e->getMessage();
        }
    }
}
