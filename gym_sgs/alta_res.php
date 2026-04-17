<?php
include('conexion.php');
$conexion = conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    redirigir_si_no_post('alta_res.html', array('member_id', 'activity_code', 'reservation_date', 'price'));
    $member_id = post_escapado($conexion, 'member_id');
    $activity_code = post_escapado($conexion, 'activity_code');
    $reservation_date = post_escapado($conexion, 'reservation_date');
    $price = post_escapado($conexion, 'price');
    $consulta = mysqli_query($conexion, "INSERT INTO reservations (member_id, activity_code, reservation_date, price) VALUES ('$member_id', '$activity_code', '$reservation_date', '$price')");
    if ($consulta) {
        redirigir_con_feedback('success', 'Data saved successfully.', 'consulta_res.php');
    } else {
        redirigir_con_feedback('error', 'Error saving data.', 'alta_res.html');
    }
}
?>
