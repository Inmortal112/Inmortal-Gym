<?php
include('conexion.php');
$conexion = conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    redirigir_si_no_post('alta_soc.html', array('name', 'age', 'phone'));
    $nombre = post_escapado($conexion, 'name');
    $edad = post_escapado($conexion, 'age');
    $telefono = post_escapado($conexion, 'phone');
    $consulta = mysqli_query($conexion, "INSERT INTO members (name, age, phone) VALUES ('$nombre', '$edad', '$telefono')");
    if ($consulta) {
        echo "<script>alert('DATA SAVED SUCCESSFULLY');window.location='consulta_soc.php';</script>";
    } else {
        echo "<script>alert('ERROR SAVING DATA');window.location='alta_soc.html';</script>";
    }
}
?>
