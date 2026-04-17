<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_res.html', array('member_id', 'activity_code'));
$member_id = post_escapado($conexion, 'member_id');
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    render_subpage_inicio('Confirm Delete Reservation', 'Review booking details before deleting');
    echo '<form method="post" action="baja_res2.php" class="form-grid">';
    echo '<label for="member_id">Member ID</label><input id="member_id" type="text" name="member_id" value="' . h($fila['member_id']) . '" readonly>';
    echo '<label for="activity_code">Activity Code</label><input id="activity_code" type="text" name="activity_code" value="' . h($fila['activity_code']) . '" readonly>';
    echo '<label for="reservation_date">Date</label><input id="reservation_date" type="text" name="reservation_date" value="' . h($fila['reservation_date']) . '" readonly>';
    echo '<label for="price">Price</label><input id="price" type="text" name="price" value="' . h($fila['price']) . '" readonly>';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">DELETE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Reservation does not exist.', 'baja_res.html');
}
?>
