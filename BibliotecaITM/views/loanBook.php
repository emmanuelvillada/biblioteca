<?php

if (!isset($_SESSION['document_number'])) {
    header("Location: /BibliotecaITM/public/index.php?controller=UserController&action=login");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Prestar Libro</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleBooks.css">
</head>
<body>

    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=listBooksForLoan">Volver a la lista de libros</a></li>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Prestar Libro</h1>
        <form method="POST" action="/BibliotecaITM/public/index.php?controller=LoanController&action=loanBook">
            <label for="document_number">Número de Documento:</label>
            <input type="text" id="document_number" name="document_number" value="<?php echo htmlspecialchars($_SESSION['document_number']); ?>" readonly required><br>
            <label for="book_code">Código del Libro:</label>
            <input type="text" id="book_code" name="book_code" value="<?php echo htmlspecialchars($_GET['code']); ?>" readonly required><br>
            <label for="start_date">Fecha Inicio:</label>
            <input type="date" id="start_date" name="start_date" required><br>
            <button type="submit">Prestar Libro</button>
        </form>
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
