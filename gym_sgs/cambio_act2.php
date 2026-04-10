<?php
include('conexion.php');
$conexion = conectar();
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$nombre = mysqli_real_escape_string($conexion, $_POST['name']);
$trainer_id = mysqli_real_escape_string($conexion, $_POST['trainer_id']);
$horario = mysqli_real_escape_string($conexion, $_POST['schedule']);
$image = mysqli_real_escape_string($conexion, $_POST['image']);
$consulta = mysqli_query($conexion, "UPDATE activities SET name='$nombre', trainer_id='$trainer_id', schedule='$horario', image='$image' WHERE activity_code='$activity_code'");
if ($consulta) {
    echo "<script>alert('DATA UPDATED SUCCESSFULLY');window.location='consulta_act.php';</script>";
} else {
    echo "<script>alert('ERROR UPDATING DATA');window.location='cambio_act.html';</script>";
}
?>
