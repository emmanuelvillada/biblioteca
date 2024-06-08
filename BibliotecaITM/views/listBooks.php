<?php
$uploadDir = 'img'; // Ruta base donde se almacenan las imágenes en el servidor
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista Libros</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleListBook.css">
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=adminPanel">Volver al panel</a></li>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Lista de Libros</h1>
        <a class="add-book-button" href="/BibliotecaITM/public/index.php?controller=BookController&action=addBook">Añadir Libro</a>
        <ul class="book-list">
            <?php foreach ($books as $book): ?>
                <li class="book-item">
                    <?php
                    $imagen = $book['image_path']; // Asume que 'imagen' es el nombre del campo que guarda el nombre del archivo de la imagen
                    if (!empty($imagen)) {
                        echo '<img class="book-image" src="' . htmlspecialchars($imagen) . '" alt="Book Image">';
                    }
                    ?>
                    <div class="book-details">
                        <span class="book-title"><?php echo htmlspecialchars($book['title']); ?></span>
                        <span class="book-author">de <?php echo htmlspecialchars($book['author']); ?></span>
                    </div>
                    <div class="book-actions">
                        <a class="edit-button" href="/BibliotecaITM/public/index.php?controller=BookController&action=editBook&id=<?php echo $book['id']; ?>">Editar</a>
                        <a class="delete-button" href="/BibliotecaITM/public/index.php?controller=BookController&action=deleteBook&id=<?php echo $book['id']; ?>">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <footer>
        <div class="footer-contenedor">
            <div class="footer-contenido">
                <h2 class="website-logo">Biblioteca ITM</h2>
                <p class="footer-info">Dirección: Calle Falsa 123</p>
                <p class="footer-info">Teléfono: +123 456 789</p>
                <p class="footer-info">Correo: info@biblioteca.itm</p>
            </div>
            <div class="footer-menus">
                <div class="footer-contenido">
                    <h3 class="menu-title">Redes Sociales</h3>
                    <div class="contenedor-social">
                        <a href="#" class="social-link" style="background-image: url('../img/FacebookBlanco.png');"></a>
                        <a href="#" class="social-link" style="background-image: url('../img/InstagramBlanco.png');"></a>
                        <a href="#" class="social-link" style="background-image: url('../img/TwitterBlanco.png');"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-container">
            <p class="copyright">© 2024 Biblioteca ITM. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
