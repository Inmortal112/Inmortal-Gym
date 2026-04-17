<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_res.html', array('member_id_old', 'activity_code_old', 'member_id', 'activity_code', 'reservation_date', 'price'));
$member_id_old = post_escapado($conexion, 'member_id_old');
$activity_code_old = post_escapado($conexion, 'activity_code_old');
$member_id = post_escapado($conexion, 'member_id');
$activity_code = post_escapado($conexion, 'activity_code');
$reservation_date = post_escapado($conexion, 'reservation_date');
$price = post_escapado($conexion, 'price');
$consulta = mysqli_query($conexion, "UPDATE reservations SET member_id='$member_id', activity_code='$activity_code', reservation_date='$reservation_date', price='$price' WHERE member_id='$member_id_old' AND activity_code='$activity_code_old'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data updated successfully.', 'consulta_res.php');
} else {
    redirigir_con_feedback('error', 'Error updating data.', 'cambio_res.html');
}
?>
