<!DOCTYPE html>
<html>
<head>
    <title>Token Libro</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleShowToken.css">
</head>
<body> 
    
<nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/views/main.php">Inicio</a></li>
            <li><a href="/BibliotecaITM/views/listBooksForLoan.php">Préstamos</a></li>
            <li><a href="/BibliotecaITM/views/listBooks.php">Libros</a></li>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <main class="container"> 
    <h1>Token de Préstamo</h1>
    <p>Tu Token de préstamo es: <strong><?php echo htmlspecialchars($token); ?></strong></p>
    <p>Guarde por favor este Token para reclamar su libro.</p>
    <a class="back-button" href="/BibliotecaITM/public/index.php?controller=UserController&action=userPanel">Regresar al panel de Usuario</a>
    </main>
    
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
