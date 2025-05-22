<?php
require_once(__DIR__ . '/../Model/conexion.php');

function verificarUsuario($usuario, $clave){
    global $conexion;
    $sql = "SELECT * FROM usuario WHERE correo = '$usuario' AND contraseña = '$clave'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado->num_rows > 0) {
        return true; 
    } else {
        return false;
    }

    $conexion->close();

}

if (isset($_POST['btnIniciarSesion'])){
    if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        if (verificarUsuario($correo, $contraseña)) {
            header("Location: ../Model/conexion.php");
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }
}



?>