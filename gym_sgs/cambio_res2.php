<?php
include('conexion.php');
$conexion = conectar();
$member_id_old = mysqli_real_escape_string($conexion, $_POST['member_id_old']);
$activity_code_old = mysqli_real_escape_string($conexion, $_POST['activity_code_old']);
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$reservation_date = mysqli_real_escape_string($conexion, $_POST['reservation_date']);
$price = mysqli_real_escape_string($conexion, $_POST['price']);
$consulta = mysqli_query($conexion, "UPDATE reservations SET member_id='$member_id', activity_code='$activity_code', reservation_date='$reservation_date', price='$price' WHERE member_id='$member_id_old' AND activity_code='$activity_code_old'");
if ($consulta) {
    echo "<script>alert('DATA UPDATED SUCCESSFULLY');window.location='consulta_res.php';</script>";
} else {
    echo "<script>alert('ERROR UPDATING DATA');window.location='cambio_res.html';</script>";
}
?>
