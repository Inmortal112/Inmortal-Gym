<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_soc.html', array('member_id'));
$member_id = post_escapado($conexion, 'member_id');
$consulta = mysqli_query($conexion, "DELETE FROM members WHERE member_id='$member_id'");
if ($consulta) {
    echo "<script>alert('DATA DELETED SUCCESSFULLY');window.location='consulta_soc.php';</script>";
} else {
    echo "<script>alert('ERROR DELETING DATA');window.location='baja_soc.html';</script>";
}
?>
