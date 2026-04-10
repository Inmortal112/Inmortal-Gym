<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$consulta = mysqli_query($conexion, "DELETE FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($consulta) {
    echo "<script>alert('DATA DELETED SUCCESSFULLY');window.location='consulta_res.php';</script>";
} else {
    echo "<script>alert('ERROR DELETING DATA');window.location='baja_res.html';</script>";
}
?>
