<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$reservation_date = mysqli_real_escape_string($conexion, $_POST['reservation_date']);
$price = mysqli_real_escape_string($conexion, $_POST['price']);
$consulta = mysqli_query($conexion, "INSERT INTO reservations (member_id, activity_code, reservation_date, price) VALUES ('$member_id', '$activity_code', '$reservation_date', '$price')");
if ($consulta) {
    echo "<script>alert('DATA SAVED SUCCESSFULLY');window.location='consulta_res.php';</script>";
} else {
    echo "<script>alert('ERROR SAVING DATA');window.location='alta_res.html';</script>";
}
?>
