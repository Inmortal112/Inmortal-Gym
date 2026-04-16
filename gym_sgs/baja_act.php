<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_act.html', array('activity_code'));
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM activities WHERE activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="baja_act2.php">';
    echo '<table width="700" align="center" bgcolor="#FCE4EC" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>CONFIRM DELETE ACTIVITY</b></font></td></tr>';
    echo '<tr><td>Code</td><td><input type="text" name="activity_code" value="' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Name</td><td><input type="text" name="name" value="' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Trainer</td><td><input type="text" name="trainer_id" value="' . htmlspecialchars($fila['trainer_id'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Schedule</td><td><input type="text" name="schedule" value="' . htmlspecialchars($fila['schedule'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Image</td><td><input type="text" name="image" value="' . htmlspecialchars($fila['image'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="DELETE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('ACTIVITY DOES NOT EXIST');window.location='baja_act.html';</script>";
}
?>
