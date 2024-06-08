<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" type="text/css" href="../views/css/styleBooks.css">
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=adminPanel">Volver al panel</a></li>
            <li><a href="/BibliotecaITM/views/login.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    
    <div class="container"> <!-- Contenedor del formulario -->
        <h1>Editar Libro</h1>
        <form method="POST" action="/BibliotecaITM/public/index.php?controller=BookController&action=editBook" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required><br>
            </div>
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required><br>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>" required><br>
            </div>
            <div class="form-group">
                <label for="publisher">Editorial:</label>
                <input type="text" id="publisher" name="publisher" value="<?php echo htmlspecialchars($book['publisher']); ?>" required><br>
            </div>
            <div class="form-group">
                <label for="code">Código:</label>
                <input type="text" id="code" name="code" value="<?php echo htmlspecialchars($book['code']); ?>" required><br>
            </div>
            <div class="form-group">
                <label for="synopsis">Sinopsis:</label>
                <textarea id="synopsis" name="synopsis" required><?php echo htmlspecialchars($book['synopsis']); ?></textarea><br>
            </div>
            <div class="form-group">
                <label for="image">Imagen (dejar en blanco para conservar la imagen actual):</label>
                <input type="file" id="image" name="image">
            </div>
            <button type="submit">Actualizar Libro</button>
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
