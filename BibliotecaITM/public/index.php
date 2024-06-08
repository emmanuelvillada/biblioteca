<?php
require_once '../controllers/UserController.php';
require_once '../controllers/BookController.php';
require_once '../controllers/LoanController.php';

session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'UserController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'UserController':
        $controller = new UserController();
        break;
    case 'BookController':
        $controller = new BookController();
        break;
    case 'LoanController':
        $controller = new LoanController();
        break;
    default:
        $controller = new UserController();
        break;
}

$controller->{$action}();
?>


