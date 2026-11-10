<?php
session_start();

// Comprobar si inició sesión
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="caja">
    <img src="imagenes/cbtis.jpg" width="100">
    <h1>Bienvenido</h1>
    <h2><?php echo $_SESSION['nombre']; ?></h2>
    <h2>Tarea 2.5: (individual)  Página con varias ramas</h2>
    <h2>Lunes 9 de noviembre del 2026</h2>
    <h2>Cbtis 217</h2>
    <hr>
    <br>
    <a href="Saludos.php">Ir a Saludos</a>
    <hr>
</div>

</body>
</html>