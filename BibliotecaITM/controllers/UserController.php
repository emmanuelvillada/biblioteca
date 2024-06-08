<?php

require_once '../Database.php';
require_once '../models/User.php';
require_once '../models/Book.php'; 
require_once '../models/Loan.php'; 

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = new Database();
        $this->userModel = new User($this->db);
        $this->bookModel = new Book($this->db); 
        $this->loanModel = new Loan($this->db);
    }

    public function index() {
        header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $document_number = $_POST['document_number'];
            $birth_date = $_POST['birth_date'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = isset($_POST['role']) ? $_POST['role'] : 'user';

            $this->userModel->register($name, $surname, $document_number, $birth_date, $password, $role);
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
        } else {
            require '../views/register.php';
        }
    }

    public function login() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $document_number = $_POST['document_number'];
            $password = $_POST['password'];

            $user = $this->userModel->login($document_number, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['document_number'] = $user['document_number'];
                
                if ($user['role'] == 'admin') {
                    header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=adminPanel");
                } else {
                    header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=userPanel");
                }
            } else {
                echo "Invalid login credentials";
            }
        } else {
            require '../views/login.php';
        }
    }

    public function adminPanel() {
        
        if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin') {
            require '../views/adminPanel.php';
        } else {
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
        }
    }

    public function userPanel() {
        
        if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') {
            require '../views/userPanel.php';
        } else {
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
    }

    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['user_id'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $document_number = $_POST['document_number'];
            $birth_date = $_POST['birth_date'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $this->userModel->updateUser($id, $name, $surname, $document_number, $birth_date, $password);
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=userPanel");
        } else {
            $id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($id);
            require '../views/editUser.php';
        }
    }

    public function listBooksForLoan() {
        $books = $this->bookModel->getAvailableBooks();
        require '../views/listBooksForLoan.php';
    }

    public function loanBook() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $document_number = $_POST['document_number'];
            $book_code = $_POST['book_code'];
            $start_date = $_POST['start_date'];
            $end_date = date('Y-m-d', strtotime($start_date . ' + 8 days'));
            $token = bin2hex(random_bytes(8));

            $this->loanModel->loanBook($user_id, $document_number, $book_code, $start_date, $end_date, $token);
            $this->bookModel->updateBookStatus($book_code, 'unavailable');

            header("Location: /BibliotecaITM/public/index.php?controller=LoanController&action=showLoanToken&token=$token");
        } else {
            $user_id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($user_id);
            $books = $this->bookModel->getAvailableBooks();
            require '../views/loanBook.php';
        }
    }

    public function showLoanToken() {
        $token = $_GET['token'];
        require '../views/showLoanToken.php';
    }

    public function userLoans() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $loans = $this->loanModel->getLoansByUser($user_id);
            require '../views/userLoans.php';
        } else {
            header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
        }
    }
    
    public function welcome() {
        $featuredBooks = $this->bookModel->getFeaturedBooks();
        require '../views/main.php';
    }
    public function backToUserPanel() {
        header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=userPanel");
    }


}
?>
