<!DOCTYPE html>
<html>
<head>
    <title>Préstamos Activos</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleListActiveLoans.css">
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
        <h1>Préstamos Activos</h1>
        <ul class="loan-list">
            <?php if (empty($loans)): ?>
                <p class="no-loans">No hay préstamos activos en este momento.</p>
            <?php else: ?>
                <?php foreach ($loans as $loan): ?>
                    <li class="loan-item">
                        <span class="book-code">CÓDIGO LIBRO:  <?php echo htmlspecialchars($loan['book_code']); ?></span> 
                        <span class="user-document">DOCUMENTO:  <?php echo htmlspecialchars($loan['user_document_number']); ?></span> 
                        <span class="loan-dates">TIEMPO DE PRÉSTAMO:  (Fecha Inicio: <?php echo htmlspecialchars($loan['start_date']); ?>, Fecha Fin: <?php echo htmlspecialchars($loan['end_date']); ?>)</span> 
                        <span class="loan-token">TOKEN PRÉSTAMO:   <?php echo htmlspecialchars($loan['token']); ?></span>
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
