<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Libro</title>
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

    <main class="container">
        <h1>Añadir Libro</h1>
        <form method="POST" action="/BibliotecaITM/public/index.php?controller=BookController&action=addBook" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="publisher">Editorial:</label>
                <input type="text" id="publisher" name="publisher" required>
            </div>
            <div class="form-group">
                <label for="code">Código:</label>
                <input type="text" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="synopsis">Sinopsis:</label>
                <textarea id="synopsis" name="synopsis" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit">Añadir Libro</button>
        </form>
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
