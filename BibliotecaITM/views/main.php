<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" type="text/css" href="../views/css/stylesmain.css">
    <link rel="stylesheet" type="text/css" href="../views/css/stylesFooter.css">
</head>
<body>
<nav>
    <img src="../img/logo.png" alt="Logo" class="logo">
    <ul class="menu">
        <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=register">Registrate</a></li>
        <li><a href="/BibliotecaITM/public/index.php?controller=UserController&action=login">Inicia sesión</a></li>
        <li><a href="/BibliotecaITM/views/main.php">Inicio</a></li>
    </ul>
</nav>
<header class="banner">
        <div class="banner-content">
            <h1>Biblioteca </h1>
            <p>Un universo de conocimiento a tu alcance</p>
        </div>
    </header>
<h1>Libros destacados</h1>
<p>Si desean prestar algunos de estos libros o algún otro por favor inicia sesión, si no esta registrado te invitamos a unirte al mundo de los libros</p>
<div class="container">
    <div class="card">
        <img src="../img/oqs.jpg" alt="Libro 1">
        <h3>Ele olvido que seremos</h3>
        <p>Hector Abad Faciolince</p>
        <p>Héctor Abad Gómez dedicó los últimos años de su vida, 
            hasta la misma noche en que cayó asesinado en pleno 
            centro de Medellín, a la defensa de los derechos humanos. 
            El olvido que seremos es la reconstrucción amorosa, 
            paciente y detallada de un personaje. Pero es también el 
            recuerdo de una ciudad, de una familia y una evocación 
            melancólica de la niñez.</p>
    </div>
    <div class="card">
        <img src="../img/cc.jpg" alt="Libro 2">
        <h3>Clean Code</h3>
        <p>Robert C. Martin</p>
        <p>Este libro es un referente para todos los programadores del mundo. Explica conceptos para mejorar la escritura del código,
             muestra casos de uso, contiene múltiples ejemplos de conversión de código y todo desde un punto de vista de un programador profesional.</p>
    </div>
    <div class="card">
        <img src="../img/lo.jpg" alt="Libro 3">
        <h3>La Odisea</h3>
        <p>Homero</p>
        <p>La Odisea es un poema épico griego compuesto por 24 cantos, atribuido al poeta griego Homero. Se cree que fue compuesta en el siglo VIII a. C. en los asentamientos que tenía Grecia en la costa oeste del Asia Menor.</p>
    </div>
</div>

<?php
    require '../views/layout/footer.php';
    ?>
</body>
</html>
