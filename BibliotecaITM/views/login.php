<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../views/css/stylesheader.css">
    <link rel="stylesheet" type="text/css" href="../views/css/stylesmain.css">
    
</head>
<body>
<?php
require '../views/layout/headerMain.php';
?>
    <div class="login-container">
    <h1>Inicio de sesión</h1>
    <form method="POST" action="/BibliotecaITM/public/index.php?controller=UserController&action=login">
        <label for="document_number">Número de documento:</label>
        <input type="text" id="document_number" name="document_number" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
</div>

<?php
require '../views/layout/footer.php';
?>
</body>
</html>
