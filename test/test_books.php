<?php 
include_once ('../models/Book.php');
include_once ('../controllers/books_controller.php');

$book = new Book();
$book->__set('title', 'El Quijote');
$book->__set('author', 'Miguel de Cervantes');
$book->__set('publication_year', 1605);
$book->__set('editorial', 'Francisco de Robles');
$book->__set('genre', 'Novela');

try {
    $bookController = new books_controller();
    $bookController->create($book);
    echo "Libro creado exitosamente.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

