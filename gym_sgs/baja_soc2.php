<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$consulta = mysqli_query($conexion, "DELETE FROM members WHERE member_id='$member_id'");
if ($consulta) {
    echo "<script>alert('DATA DELETED SUCCESSFULLY');window.location='consulta_soc.php';</script>";
} else {
    echo "<script>alert('ERROR DELETING DATA');window.location='baja_soc.html';</script>";
}
?>
