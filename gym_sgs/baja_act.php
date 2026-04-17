<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_act.html', array('activity_code'));
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM activities WHERE activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    render_subpage_inicio('Confirm Delete Activity', 'Review activity details before deleting');
    echo '<form method="post" action="baja_act2.php" class="form-grid">';
    echo '<label for="activity_code">Code</label><input id="activity_code" type="text" name="activity_code" value="' . h($fila['activity_code']) . '" readonly>';
    echo '<label for="name">Name</label><input id="name" type="text" name="name" value="' . h($fila['name']) . '" readonly>';
    echo '<label for="trainer_id">Trainer</label><input id="trainer_id" type="text" name="trainer_id" value="' . h($fila['trainer_id']) . '" readonly>';
    echo '<label for="schedule">Schedule</label><input id="schedule" type="text" name="schedule" value="' . h($fila['schedule']) . '" readonly>';
    echo '<label for="image">Image</label><input id="image" type="text" name="image" value="' . h($fila['image']) . '" readonly>';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">DELETE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Activity does not exist.', 'baja_act.html');
}
?>
