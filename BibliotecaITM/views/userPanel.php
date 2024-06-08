<!DOCTYPE html>
<html>
<head>
    <title>Panel Usuario</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleUserPanel.css">
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" id="menu-button">☰ Menu</label>

    <div id="sidebar" class="sidebar">
        <a href="/BibliotecaITM/public/index.php?controller=UserController&action=editUser">Editar tus Datos</a>
        <a href="/BibliotecaITM/public/index.php?controller=UserController&action=listBooksForLoan">Libros disponibles para Préstamo</a>
        <a href="/BibliotecaITM/public/index.php?controller=LoanController&action=showActiveLoans">Mis préstamos activos</a>
    </div>

    <div id="main-content">
        <h2>Bienvedid@, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>
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
