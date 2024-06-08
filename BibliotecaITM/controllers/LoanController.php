<?php

require_once '../Database.php';
require_once '../models/Loan.php';
require_once '../models/Book.php';
require_once '../models/User.php'; 



class LoanController {
    private $db;
    private $loanModel;
    private $bookModel;
    private $userModel; 

    public function __construct() {
        $this->db = new Database();
        $this->loanModel = new Loan($this->db);
        $this->bookModel = new Book($this->db);
        $this->userModel = new User($this->db); 
    }

    public function listBooksForLoan() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
    
        if (!empty($search)) {
            $books = $this->bookModel->searchBooks($search);
        } else {
            $books = $this->bookModel->getAvailableBooks();
        }
        
        require '../views/listBooksForLoan.php';
    }
    

    public function loanBook() {
        
    
        // Verifica si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['document_number'])) {
                $user_document_number = $_SESSION['document_number'];
            } else {
                header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
                exit();
            }
    
            $book_code = $_POST['book_code'];
            $start_date = $_POST['start_date'];
            $end_date = date('Y-m-d', strtotime($start_date . ' + 8 days'));
            $token = bin2hex(random_bytes(2));
    
            $this->loanModel->loanBook($user_document_number, $book_code, $start_date, $end_date, $token);
            $this->bookModel->updateBookStatus($book_code, 'unavailable');
    
            header("Location: /BibliotecaITM/public/index.php?controller=LoanController&action=showLoanToken&token=$token");
        } else {
            $user_id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($user_id);
            if ($user) {
                $_SESSION['document_number'] = $user['document_number'];
                $books = $this->bookModel->getAvailableBooks();
                require '../views/loanBook.php';
            } else {
                header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
                exit();
            }
        }
    }

    public function showLoanToken() {
        $token = $_GET['token'];
        require '../views/showLoanToken.php';
    }

    public function showActiveLoans() {
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
            exit();
        }
    
        $user_document_number = $_SESSION['document_number'];
        $activeLoans = $this->loanModel->getActiveLoansByUserDocumentNumber($user_document_number);
        require '../views/activeLoans.php';
    }
    public function listActiveLoans() {
        $loans = $this->loanModel->getActiveLoans();
        require '../views/listActiveLoans.php';
    }
    
    public function deleteLoan() {
        if (isset($_GET['id'])) {
            $loanId = $_GET['id'];
            $this->loanModel->deleteLoan($loanId);
        }
        header("Location: /BibliotecaITM/public/index.php?controller=LoanController&action=listActiveLoans");
    }
    public function backToAdminPanel() {
        header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=adminPanel");
    }
    public function backToUserPanel() {
        header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=userPanel");
    }
    public function endLoanView() {
        require '../views/endLoan.php';
    }
    
    public function endLoan() {
        $document_number = $_POST['document_number'];
        $book_code = $_POST['book_code'];
        $loan = $this->loanModel->getLoanByDocumentAndBookCode($document_number, $book_code);
    
        if ($loan) {
            // Obtener el nombre del usuario y el título del libro
            $user_name = $this->userModel->getUserNameByDocumentNumber($document_number);
            $book_title = $this->bookModel->getBookTitleByCode($book_code);
    
            // Terminar el préstamo y actualizar el estado del libro
            $this->loanModel->endLoan($loan['id']);
            $this->bookModel->updateBookStatus($book_code, 'available');
    
            // Agregar el préstamo al historial
            $loan['user_name'] = $user_name;
            $loan['user_document_number'] = $document_number;
            $loan['book_title'] = $book_title;
            $this->loanModel->addLoanToHistory($loan);
    
            header('Location: /BibliotecaITM/public/index.php?controller=LoanController&action=listActiveLoans');
        } else {
            echo "Loan not found.";
        }
    }
    
}
    

?>


