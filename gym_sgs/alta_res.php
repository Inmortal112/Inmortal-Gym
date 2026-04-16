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
        echo "<script>alert('DATA SAVED SUCCESSFULLY');window.location='consulta_res.php';</script>";
    } else {
        echo "<script>alert('ERROR SAVING DATA');window.location='alta_res.html';</script>";
    }
}
?>
