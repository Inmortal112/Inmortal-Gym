<?php
function conectar() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "inmortal";
    $conexion = mysqli_connect($servidor, $usuario, $password, $bd) or die("ERROR CONNECTING TO SERVER");
    mysqli_set_charset($conexion, "utf8mb4");
    return $conexion;
}
?>
