<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_soc.html', array('member_id'));
$member_id = post_escapado($conexion, 'member_id');
$consulta = mysqli_query($conexion, "DELETE FROM members WHERE member_id='$member_id'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data deleted successfully.', 'consulta_soc.php');
} else {
    redirigir_con_feedback('error', 'Error deleting data.', 'baja_soc.html');
}
?>
