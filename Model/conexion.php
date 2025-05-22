<?php

$nameDB = "bd_transporte_rivera";
$servidorDB = "localhost";
$usuarioDB = "root";
$claveDB = "";
$conexion = mysqli_connect($servidorDB, $usuarioDB, $claveDB, $nameDB);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos.";
}




?>