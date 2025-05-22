<?php
include('../../Controller/verificarInicioSesion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../Controller/verificarInicioSesion.php" method="post">
        <input type="email" name="correo" placeholder="Correo">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesión" name="btnIniciarSesion">
    </form>
</body>
</html>