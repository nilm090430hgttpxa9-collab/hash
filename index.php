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
    <h1>Bienvenido</h1>
    <h2><?php echo $_SESSION['nombre']; ?></h2>
    <p>Has iniciado sesión correctamente.</p>
</div>

</body>
</html>