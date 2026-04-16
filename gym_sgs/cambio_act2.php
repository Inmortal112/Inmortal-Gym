<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_act.html', array('activity_code', 'name', 'trainer_id', 'schedule', 'image'));
$activity_code = post_escapado($conexion, 'activity_code');
$nombre = post_escapado($conexion, 'name');
$trainer_id = post_escapado($conexion, 'trainer_id');
$horario = post_escapado($conexion, 'schedule');
$image = post_escapado($conexion, 'image');
$consulta = mysqli_query($conexion, "UPDATE activities SET name='$nombre', trainer_id='$trainer_id', schedule='$horario', image='$image' WHERE activity_code='$activity_code'");
if ($consulta) {
    echo "<script>alert('DATA UPDATED SUCCESSFULLY');window.location='consulta_act.php';</script>";
} else {
    echo "<script>alert('ERROR UPDATING DATA');window.location='cambio_act.html';</script>";
}
?>
