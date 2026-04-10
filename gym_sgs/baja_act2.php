<?php
include('conexion.php');
$conexion = conectar();
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$consulta = mysqli_query($conexion, "DELETE FROM activities WHERE activity_code='$activity_code'");
if ($consulta) {
    echo "<script>alert('DATA DELETED SUCCESSFULLY');window.location='consulta_act.php';</script>";
} else {
    echo "<script>alert('ERROR DELETING DATA');window.location='baja_act.html';</script>";
}
?>
