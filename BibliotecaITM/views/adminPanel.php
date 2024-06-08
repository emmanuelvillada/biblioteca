<!DOCTYPE html>
<html>
<head>
    <title>Panel Usuario</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleAdminPanel.css">
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
        <a href="/BibliotecaITM/public/index.php?controller=BookController&action=addBook">Añadir Libro</a>  
        <a href="/BibliotecaITM/public/index.php?controller=BookController&action=listBooks">Lista de Libros</a>
        <a href="/BibliotecaITM/public/index.php?controller=LoanController&action=listActiveLoans">Préstamos Activos</a>
        <a href="/BibliotecaITM/public/index.php?controller=LoanController&action=endLoanView">Finalizar Préstamo</a>
    </div>

    <div id="main-content">
        <h2>Bienvenid@, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        
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
