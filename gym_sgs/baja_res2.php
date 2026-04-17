<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_res.html', array('member_id', 'activity_code'));
$member_id = post_escapado($conexion, 'member_id');
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "DELETE FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data deleted successfully.', 'consulta_res.php');
} else {
    redirigir_con_feedback('error', 'Error deleting data.', 'baja_res.html');
}
?>
