<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_soc.html', array('member_id', 'name', 'age', 'phone'));
$member_id = post_escapado($conexion, 'member_id');
$nombre = post_escapado($conexion, 'name');
$edad = post_escapado($conexion, 'age');
$telefono = post_escapado($conexion, 'phone');
$consulta = mysqli_query($conexion, "UPDATE members SET name='$nombre', age='$edad', phone='$telefono' WHERE member_id='$member_id'");
if ($consulta) {
    redirigir_con_feedback('success', 'Data updated successfully.', 'consulta_soc.php');
} else {
    redirigir_con_feedback('error', 'Error updating data.', 'cambio_soc.html');
}
?>
