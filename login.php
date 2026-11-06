
<?php
session_start();

$texto = "";

if (isset($_POST['entrar'])) {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $encontrado = false;

    // Buscar usuario registrado
    foreach ($_SESSION['usuarios'] as $u) {

        if ($u['usuario'] == $usuario) {

            // Verificar contraseña
            if (password_verify($password, $u['password'])) {

                $_SESSION['nombre'] = $u['nombre'];
                $_SESSION['login'] = true;

                header("Location: index.php");
                exit();

            } else {
                $texto = "Contraseña incorrecta";
            }

            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        $texto = "Usuario no encontrado";
    }
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

    <img src="imagenes/login.jpg" width="130">

    <h1>Iniciar sesión</h1>

    <form method="POST">

        <input type="text" name="usuario" placeholder="Nombre de usuario" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit" name="entrar">Ingresar</button>

    </form>

    <p><?php echo $texto; ?></p>

    <a href="registro.php">Crear una cuenta</a>

</div>

</body>
</html>
