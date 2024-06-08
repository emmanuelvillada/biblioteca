<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="../views/css/stylesheader.css">
    <link rel="stylesheet" type="text/css" href="../views/css/stylesmain.css">
</head>
<body>
<?php
require '../views/layout/headerMain.php';
?>
<div class="register-container">
    <h1>Registro</h1>
    <form method="POST" action="/BibliotecaITM/public/index.php?controller=UserController&action=register">
        <label for="name">Nombres:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="surname">Apellidos:</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="document_number">Número de documento:</label>
        <input type="text" id="document_number" name="document_number" required><br>
        <label for="birth_date">Fecha de nacimiento:</label>
        <input type="date" id="birth_date" name="birth_date" required><br>
        <label for="birth_date">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Registrarse</button>
    </form>
</div> 
<?php
require '../views/layout/footer.php';
?> 
</body>
</html>
