<?php
include('conexion.php');
$conexion = conectar();
$sql = "SELECT * FROM members ORDER BY member_id";
$consulta = query_or_error($conexion, $sql);
render_subpage_inicio('Members List', 'View all member records');
echo '<div class="table-wrap">';
echo '<table class="data-table">';
echo '<thead><tr><th>Member ID</th><th>Name</th><th>Age</th><th>Phone</th></tr></thead>';
echo '<tbody>';
if ($consulta && mysqli_num_rows($consulta) > 0) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        echo '<tr>';
        echo '<td>' . h($fila['member_id']) . '</td>';
        echo '<td>' . h($fila['name']) . '</td>';
        echo '<td>' . h($fila['age']) . '</td>';
        echo '<td>' . h($fila['phone']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No members found or an error occurred.</td></tr>';
}
echo '</tbody></table></div>';
render_subpage_fin();
?>
