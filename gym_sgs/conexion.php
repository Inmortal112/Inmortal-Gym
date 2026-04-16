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

function redirigir_si_no_post($destino, $campos = array()) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . $destino);
        exit;
    }

    foreach ($campos as $campo) {
        if (!isset($_POST[$campo]) || $_POST[$campo] === '') {
            header('Location: ' . $destino);
            exit;
        }
    }
}

function post_escapado($conexion, $campo) {
    return mysqli_real_escape_string($conexion, $_POST[$campo] ?? '');
}
?>
