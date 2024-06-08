<!DOCTYPE html>
<html>
<head>
    <title>Libros Disponibles</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleListBookForLoan.css">
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=userPanel">Volver al panel</a></li>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Libros disponibles para Prestar</h1>
        <form class="search-form" method="GET" action="/BibliotecaITM/public/index.php">
            <input type="hidden" name="controller" value="LoanController">
            <input type="hidden" name="action" value="listBooksForLoan">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese el nombre o código del libro">
            <button type="submit">Buscar Libro</button>
        </form>
        
        <ul class="book-list">
            <?php if (empty($books)): ?>
                <p>No hay libros disponibles para prestar en este momento.</p>
            <?php else: ?>
                <?php foreach ($books as $book): ?>
                    <li class="book-item">
                        <?php
                        $imagen = $book['image_path'];
                        if (!empty($imagen)) {
                            echo '<img class="book-image" src="' . htmlspecialchars($imagen) . '" alt="Book Image">';
                        }
                        ?>
                        <div class="book-details">
                            <span class="book-title"><?php echo htmlspecialchars($book['title']); ?></span>
                            <span class="book-author">by <?php echo htmlspecialchars($book['author']); ?></span>
                        </div>
                        <a class="loan-button" href="/BibliotecaITM/public/index.php?controller=LoanController&action=loanBook&code=<?php echo $book['code']; ?>">Loan this Book</a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
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
