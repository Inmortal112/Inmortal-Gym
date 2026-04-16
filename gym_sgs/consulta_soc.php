<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT * FROM members ORDER BY member_id");
echo '<table width="700" align="center" bgcolor="#D9EAF7" cellpadding="8" cellspacing="0" border="1">';
echo '<tr bgcolor="#A9CCE3"><td colspan="4" align="center"><font face="Arial" size="5"><b>MEMBERS LIST</b></font></td></tr>';
echo '<tr bgcolor="#D4E6F1"><td><b>Member ID</b></td><td><b>Name</b></td><td><b>Age</b></td><td><b>Phone</b></td></tr>';
while ($fila = mysqli_fetch_array($consulta)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($fila['member_id'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['age'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['phone'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
