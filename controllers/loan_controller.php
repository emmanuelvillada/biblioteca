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
        if(!empty($loan)){
        try {
            $pdo = $this->db->getConnection();
            $sql = "INSERT INTO prestamo(book_id,user_id, status, token, loan_date, expected_return_date) 
            VALUES (:book_id, :user_id, :status, :token, :loan_date, :expected_return_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('book_id',$loan->__get('book_id'));
            $stmt->bindParam('user_id',$loan->__get('user_id'));
            $stmt->bindParam('status',$loan->__get('status'));
            $stmt->bindParam('token',$loan->__get('token'));
            $stmt->bindParam('loan_date',$loan->__get('loan_date'));
            $stmt->bindParam('expected_return_date',$loan->__get('expected_return_date'));
            $stmt->execute();
        } catch (PDOException $e) {
        throw new Exception($e->getMessage());
        }
    }
    }
}
