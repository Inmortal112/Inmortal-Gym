<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_act.html', array('activity_code'));
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "DELETE FROM activities WHERE activity_code='$activity_code'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data deleted successfully.', 'consulta_act.php');
} else {
    redirigir_con_feedback('error', 'Error deleting data.', 'baja_act.html');
}
?>
