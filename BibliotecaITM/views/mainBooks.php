<!DOCTYPE html>
<html>
<head>
    <title>Libros Destacados</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleMainBooks.css">
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=adminPanel">Volver al panel</a>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Panel Administrador</h1>

        <!-- Form to add featured books -->
        <h2>Añadir Libros Destacados</h2>
        <form class="featured-books-form" method="POST" action="/BibliotecaITM/public/index.php?controller=BookController&action=addFeaturedBooks" enctype="multipart/form-data">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="book-card">
                    <h3>Book <?php echo $i; ?></h3>
                    <label for="name_<?php echo $i; ?>">Nombre:</label>
                    <input type="text" id="name_<?php echo $i; ?>" name="name_<?php echo $i; ?>" required><br>
                    <label for="author_<?php echo $i; ?>">Autor:</label>
                    <input type="text" id="author_<?php echo $i; ?>" name="author_<?php echo $i; ?>" required><br>
                    <label for="synopsis_<?php echo $i; ?>">Sinopsis:</label>
                    <textarea id="synopsis_<?php echo $i; ?>" name="synopsis_<?php echo $i; ?>" required></textarea><br>
                    <label for="image_<?php echo $i; ?>">Imagen:</label>
                    <input type="file" id="image_<?php echo $i; ?>" name="image_<?php echo $i; ?>" accept="image/*" required><br>
                </div>
            <?php endfor; ?>
            <button type="submit">Guardar libros destacados</button>
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
