<?php
session_start(); // Iniciar o continuar sesión
require_once(__DIR__ . '/../Model/conexion.php');

// Función para verificar el usuario y la contraseña
function verificarUsuario($usuario, $clave){
    global $conexion; // se asigna la variable de conexion a la variable global
    $sql = "SELECT id_usuario FROM usuario WHERE correo = '$usuario' AND contraseña = '$clave'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $id_usuario = $fila['id_usuario']; // Guardar el id_usuario en la variable de sesion
        $_SESSION['id_usuario'] = $id_usuario; // Guardar el id_usuario en la sesión
        return true; 
    } else {
        return false;
    }

    $conexion->close();

}

// Verificar si se ha enviado el formulario y si este se envio correctamente asigna los valores a la variables para
// darle los parametros a la funcion verificarUsuario
// y redirigir a la pagina de conexion(Temporalmente)
if (isset($_POST['btnIniciarSesion'])){
    if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        if(!empty($correo) && !empty($contraseña)){
            $correo =  $correo = filter_var($correo, FILTER_SANITIZE_STRING);
            $contraseña = filter_var($contraseña, FILTER_SANITIZE_STRING);

            $_SESSION['logueado'] = true ; // Marcar al usuario como logueado
            $_SESSION['usuario'] = $correo; // Guardar el correo en la sesión
            $_SESSION['contraseña'] = $contraseña; // Guardar la contraseña en la sesión
            
            if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == true){
                echo "Bienvenido, " . $_SESSION['usuario'] . "<br>" . "ID de usuario: " . $_SESSION['id_usuario'] . "<br>";
            }

        }

        if (verificarUsuario($correo, $contraseña)) {
            //header("Location: ../Controller/verificarInicioSesion.php");
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }
}



?>