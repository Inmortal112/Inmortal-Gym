<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT a.activity_code, a.name, a.trainer_id, e.name AS trainer_name, e.specialty, a.schedule, a.image FROM activities a INNER JOIN personal_trainers e ON a.trainer_id = e.trainer_id ORDER BY a.activity_code");
echo '<table width="900" align="center" bgcolor="#F3E5FF" cellpadding="8" cellspacing="0" border="1">';
echo '<tr bgcolor="#D7BDE2"><td colspan="7" align="center"><font face="Arial" size="5"><b>ACTIVITIES LIST</b></font></td></tr>';
echo '<tr bgcolor="#E8DAEF"><td><b>Code</b></td><td><b>Name</b></td><td><b>Trainer ID</b></td><td><b>Trainer</b></td><td><b>Type</b></td><td><b>Schedule</b></td><td><b>Image</b></td></tr>';
while ($fila = mysqli_fetch_array($consulta)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['trainer_id'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['trainer_name'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['specialty'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['schedule'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['image'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
