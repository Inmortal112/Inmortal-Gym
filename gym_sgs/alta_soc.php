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
        redirigir_con_feedback('success', 'Data saved successfully.', 'consulta_soc.php');
    } else {
        redirigir_con_feedback('error', 'Error saving data.', 'alta_soc.html');
    }
}
?>
