<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_act.html', array('activity_code'));
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM activities WHERE activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="cambio_act2.php">';
    echo '<table width="700" align="center" bgcolor="#E8DAEF" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>EDIT ACTIVITY</b></font></td></tr>';
    echo '<tr><td>Code</td><td><input type="text" name="activity_code" value="' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Name</td><td><input type="text" name="name" value="' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '" size="40"></td></tr>';
    echo '<tr><td>Trainer</td><td>';
    echo '<select name="trainer_id">';
    $trainers = mysqli_query($conexion, "SELECT trainer_id, name FROM personal_trainers ORDER BY trainer_id");
    while ($trainer = mysqli_fetch_array($trainers)) {
        $selected = ($fila['trainer_id'] == $trainer['trainer_id']) ? 'selected' : '';
        echo '<option value="' . htmlspecialchars($trainer['trainer_id'], ENT_QUOTES, 'UTF-8') . '" ' . $selected . '>' . htmlspecialchars($trainer['trainer_id'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($trainer['name'], ENT_QUOTES, 'UTF-8') . '</option>';
    }
    echo '</select></td></tr>';
    echo '<tr><td>Schedule</td><td><input type="text" name="schedule" value="' . htmlspecialchars($fila['schedule'], ENT_QUOTES, 'UTF-8') . '" size="40"></td></tr>';
    echo '<tr><td>Image</td><td><input type="text" name="image" value="' . htmlspecialchars($fila['image'], ENT_QUOTES, 'UTF-8') . '" size="30"></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="UPDATE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('ACTIVITY DOES NOT EXIST');window.location='cambio_act.html';</script>";
}
?>
