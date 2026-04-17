<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT * FROM members ORDER BY member_id");
render_subpage_inicio('Members List', 'View all member records');
echo '<div class="table-wrap">';
echo '<table class="data-table">';
echo '<thead><tr><th>Member ID</th><th>Name</th><th>Age</th><th>Phone</th></tr></thead>';
echo '<tbody>';
while ($fila = mysqli_fetch_array($consulta)) {
    echo '<tr>';
    echo '<td>' . h($fila['member_id']) . '</td>';
    echo '<td>' . h($fila['name']) . '</td>';
    echo '<td>' . h($fila['age']) . '</td>';
    echo '<td>' . h($fila['phone']) . '</td>';
    echo '</tr>';
}
echo '</tbody></table></div>';
render_subpage_fin();
?>
