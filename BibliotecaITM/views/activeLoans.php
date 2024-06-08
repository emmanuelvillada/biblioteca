<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos Activos</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleActiveLoans.css">
    <link rel="shortcut icon" href="img/logo.png">
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
        <h1>Préstamos Activos</h1>
        <?php if (!empty($activeLoans)): ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Código del Libro</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Token</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activeLoans as $loan): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($loan['book_code']); ?></td>
                            <td><?php echo htmlspecialchars($loan['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($loan['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($loan['token']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron préstamos activos.</p>
        <?php endif; ?>
        <a href="/BibliotecaITM/public/index.php?controller=LoanController&action=listBooksForLoan" class="btn">Volver a la Lista de Libros</a>
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
