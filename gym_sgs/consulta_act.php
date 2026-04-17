<?php
include('conexion.php');
$conexion = conectar();
$consulta = mysqli_query($conexion, "SELECT a.activity_code, a.name, a.trainer_id, e.name AS trainer_name, e.specialty, a.schedule, a.image FROM activities a INNER JOIN personal_trainers e ON a.trainer_id = e.trainer_id ORDER BY a.activity_code");
render_subpage_inicio('Activities List', 'All activities with trainer information');
echo '<div class="table-wrap">';
echo '<table class="data-table">';
echo '<thead><tr><th>Code</th><th>Name</th><th>Trainer ID</th><th>Trainer</th><th>Type</th><th>Schedule</th><th>Image</th></tr></thead>';
echo '<tbody>';
while ($fila = mysqli_fetch_array($consulta)) {
    $imagen = normalizar_imagen_actividad($fila['image']);
    echo '<tr>';
    echo '<td>' . h($fila['activity_code']) . '</td>';
    echo '<td>' . h($fila['name']) . '</td>';
    echo '<td>' . h($fila['trainer_id']) . '</td>';
    echo '<td>' . h($fila['trainer_name']) . '</td>';
    echo '<td>' . h($fila['specialty']) . '</td>';
    echo '<td>' . h($fila['schedule']) . '</td>';
    echo '<td>' . h($imagen) . '</td>';
    echo '</tr>';
}
echo '</tbody></table></div>';
render_subpage_fin();
?>
