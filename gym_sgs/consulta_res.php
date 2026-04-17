<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT r.member_id, s.name AS member_name, r.activity_code, a.name AS activity_name, r.reservation_date, r.price FROM reservations r INNER JOIN members s ON r.member_id = s.member_id INNER JOIN activities a ON r.activity_code = a.activity_code ORDER BY r.member_id, r.activity_code");
render_subpage_inicio('Reservations List', 'Bookings with member and activity details');
echo '<div class="table-wrap">';
echo '<table class="data-table">';
echo '<thead><tr><th>Member ID</th><th>Member</th><th>Activity Code</th><th>Activity</th><th>Date</th><th>Price</th></tr></thead>';
echo '<tbody>';
while ($fila = mysqli_fetch_array($consulta)) {
    echo '<tr>';
    echo '<td>' . h($fila['member_id']) . '</td>';
    echo '<td>' . h($fila['member_name']) . '</td>';
    echo '<td>' . h($fila['activity_code']) . '</td>';
    echo '<td>' . h($fila['activity_name']) . '</td>';
    echo '<td>' . h($fila['reservation_date']) . '</td>';
    echo '<td>' . h($fila['price']) . '</td>';
    echo '</tr>';
}
echo '</tbody></table></div>';
render_subpage_fin();
?>
