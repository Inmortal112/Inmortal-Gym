<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_act.html', array('activity_code', 'name', 'trainer_id', 'schedule', 'image'));
$activity_code = post_escapado($conexion, 'activity_code');
$nombre = post_escapado($conexion, 'name');
$trainer_id = post_escapado($conexion, 'trainer_id');
$horario = post_escapado($conexion, 'schedule');
$image = normalizar_imagen_actividad(post_escapado($conexion, 'image'));
$consulta = mysqli_query($conexion, "UPDATE activities SET name='$nombre', trainer_id='$trainer_id', schedule='$horario', image='$image' WHERE activity_code='$activity_code'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data updated successfully.', 'consulta_act.php');
} else {
    redirigir_con_feedback('error', 'Error updating data.', 'cambio_act.html');
}
?>
