<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$nombre = mysqli_real_escape_string($conexion, $_POST['name']);
$edad = mysqli_real_escape_string($conexion, $_POST['age']);
$telefono = mysqli_real_escape_string($conexion, $_POST['phone']);
$consulta = mysqli_query($conexion, "UPDATE members SET name='$nombre', age='$edad', phone='$telefono' WHERE member_id='$member_id'");
if ($consulta) {
    echo "<script>alert('DATA UPDATED SUCCESSFULLY');window.location='consulta_soc.php';</script>";
} else {
    echo "<script>alert('ERROR UPDATING DATA');window.location='cambio_soc.html';</script>";
}
?>
