<?php

class Loan {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db->getPDO();
    }

    public function loanBook($user_document_number, $book_code, $start_date, $end_date, $token) {
        $stmt = $this->pdo->prepare("INSERT INTO loans (user_document_number, book_code, start_date, end_date, token) VALUES (:user_document_number, :book_code, :start_date, :end_date, :token)");
        $stmt->bindParam(':user_document_number', $user_document_number);
        $stmt->bindParam(':book_code', $book_code);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
    }

    public function getLoansByUserId($user_document_number) {
        $stmt = $this->pdo->prepare("SELECT * FROM loans WHERE user_document_number = :user_document_number");
        $stmt->bindParam(':user_document_number', $user_document_number);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getActiveLoansByUserDocumentNumber($user_document_number) {
        $stmt = $this->pdo->prepare("SELECT * FROM loans WHERE user_document_number = :user_document_number AND end_date >= CURDATE()");
        $stmt->bindParam(':user_document_number', $user_document_number);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getActiveLoans() {
        $stmt = $this->pdo->query("SELECT * FROM loans WHERE end_date >= CURDATE()");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function deleteLoan($loanId) {
        // Obtener el código del libro antes de eliminar el préstamo
        $stmt = $this->pdo->prepare("SELECT book_code FROM loans WHERE id = :id");
        $stmt->bindParam(':id', $loanId);
        $stmt->execute();
        $loan = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($loan) {
            // Eliminar el préstamo
            $stmt = $this->pdo->prepare("DELETE FROM loans WHERE id = :id");
            $stmt->bindParam(':id', $loanId);
            $stmt->execute();
    
            // Actualizar el estado del libro a disponible
            $stmt = $this->pdo->prepare("UPDATE books SET status = 'available' WHERE code = :book_code");
            $stmt->bindParam(':book_code', $loan['book_code']);
            $stmt->execute();
        }
    }
    public function getLoanByDocumentAndBookCode($document_number, $book_code) {
        $stmt = $this->pdo->prepare("SELECT * FROM loans WHERE user_document_number = :document_number AND book_code = :book_code");
        $stmt->bindParam(':document_number', $document_number);
        $stmt->bindParam(':book_code', $book_code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function endLoan($loan_id) {
        $stmt = $this->pdo->prepare("DELETE FROM loans WHERE id = :loan_id");
        $stmt->bindParam(':loan_id', $loan_id);
        $stmt->execute();
    }
    
    public function addLoanToHistory($loan) {
        $stmt = $this->pdo->prepare("INSERT INTO loan_history (user_name, document_number, book_code, book_title, start_date, end_date) VALUES (:user_name, :user_document_number, :book_code, :book_title, :start_date, NOW())");
        $stmt->bindParam(':user_name', $loan['user_name']);
        $stmt->bindParam(':user_document_number', $loan['user_document_number']);
        $stmt->bindParam(':book_code', $loan['book_code']);
        $stmt->bindParam(':book_title', $loan['book_title']);
        $stmt->bindParam(':start_date', $loan['start_date']);
        $stmt->execute();
    }
    
    
}
?>

