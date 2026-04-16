<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT r.member_id, s.name AS member_name, r.activity_code, a.name AS activity_name, r.reservation_date, r.price FROM reservations r INNER JOIN members s ON r.member_id = s.member_id INNER JOIN activities a ON r.activity_code = a.activity_code ORDER BY r.member_id, r.activity_code");
echo '<table width="900" align="center" bgcolor="#E8F8F5" cellpadding="8" cellspacing="0" border="1">';
echo '<tr bgcolor="#ABEBC6"><td colspan="6" align="center"><font face="Arial" size="5"><b>RESERVATIONS LIST</b></font></td></tr>';
echo '<tr bgcolor="#D5F5E3"><td><b>Member ID</b></td><td><b>Member</b></td><td><b>Activity Code</b></td><td><b>Activity</b></td><td><b>Date</b></td><td><b>Price</b></td></tr>';
while ($fila = mysqli_fetch_array($consulta)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($fila['member_id'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['member_name'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['activity_name'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['reservation_date'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($fila['price'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
