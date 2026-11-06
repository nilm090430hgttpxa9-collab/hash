
<?php
session_start();

// Crear arreglo de usuarios
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = array();
}

$texto = "";

if (isset($_POST['registrar'])) {

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if ($nombre == "" || $usuario == "" || $password == "" || $confirmar == "") {
        $texto = "Llena los campos";
    }
    elseif (strlen($password) < 6) {
        $texto = "La contraseña debe tener 6 caracteres";
    }
    elseif ($password != $confirmar) {
        $texto = "Las contraseñas no coinciden";
    }
    else {

        // Comprobar si el usuario ya existe
        $registrado = false;

        foreach ($_SESSION['usuarios'] as $u) {
            if ($u['usuario'] == $usuario) {
                $registrado = true;
            }
        }

        if ($registrado) {
            $texto = "El usuario ya existe";
        }
        else {
            // Crear contraseña protegida
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Guardar usuario
            $_SESSION['usuarios'][] = array(
                "nombre" => $nombre,
                "usuario" => $usuario,
                "password" => $hash
            );

            $texto = "Usuario registrado correctamente";
        }
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
    <img src="imagenes/registro.jpg" width="120">
    <h1>Registro de empleados</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>
        <button type="submit" name="registrar">Registrarme</button>
    </form>
    <p><?php echo $texto; ?></p>
    <a href="login.php">Ya tengo una cuenta :)</a>
</div>

</body>
</html>
