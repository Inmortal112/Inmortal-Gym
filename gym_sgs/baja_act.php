<?php
include('conexion.php');
$conexion = conectar();
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$consulta = mysqli_query($conexion, "SELECT * FROM activities WHERE activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="baja_act2.php">';
    echo '<table width="700" align="center" bgcolor="#FCE4EC" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>CONFIRM DELETE ACTIVITY</b></font></td></tr>';
    echo '<tr><td>Code</td><td><input type="text" name="activity_code" value="' . $fila['activity_code'] . '" readonly></td></tr>';
    echo '<tr><td>Name</td><td><input type="text" name="name" value="' . $fila['name'] . '" readonly></td></tr>';
    echo '<tr><td>Trainer</td><td><input type="text" name="trainer_id" value="' . $fila['trainer_id'] . '" readonly></td></tr>';
    echo '<tr><td>Schedule</td><td><input type="text" name="schedule" value="' . $fila['schedule'] . '" readonly></td></tr>';
    echo '<tr><td>Image</td><td><input type="text" name="image" value="' . $fila['image'] . '" readonly></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="DELETE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('ACTIVITY DOES NOT EXIST');window.location='baja_act.html';</script>";
}
?>
