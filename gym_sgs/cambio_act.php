<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_act.html', array('activity_code'));
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM activities WHERE activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    $imagen_actual = normalizar_imagen_actividad($fila['image']);
    render_subpage_inicio('Edit Activity', 'Update class details and trainer');
    echo '<form method="post" action="cambio_act2.php" class="form-grid">';
    echo '<label for="activity_code">Code</label><input id="activity_code" type="text" name="activity_code" value="' . h($fila['activity_code']) . '" readonly>';
    echo '<label for="name">Name</label><input id="name" type="text" name="name" value="' . h($fila['name']) . '" required>';
    echo '<label for="trainer_id">Trainer</label>';
    echo '<select id="trainer_id" name="trainer_id">';
    $trainers = mysqli_query($conexion, "SELECT trainer_id, name FROM personal_trainers ORDER BY trainer_id");
    while ($trainer = mysqli_fetch_array($trainers)) {
        $selected = ($fila['trainer_id'] == $trainer['trainer_id']) ? 'selected' : '';
        echo '<option value="' . h($trainer['trainer_id']) . '" ' . $selected . '>' . h($trainer['trainer_id']) . ' - ' . h($trainer['name']) . '</option>';
    }
    echo '</select>';
    echo '<label for="schedule">Schedule</label><input id="schedule" type="text" name="schedule" value="' . h($fila['schedule']) . '" required>';
    echo '<label for="image">Image</label><input id="image" type="text" name="image" value="' . h($imagen_actual) . '" required>';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">UPDATE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Activity does not exist.', 'cambio_act.html');
}
?>
