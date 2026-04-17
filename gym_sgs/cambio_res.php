<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_res.html', array('member_id', 'activity_code'));
$member_id = post_escapado($conexion, 'member_id');
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    render_subpage_inicio('Edit Reservation', 'Update booking details');
    echo '<form method="post" action="cambio_res2.php" class="form-grid">';
    echo '<label for="member_id">Member ID</label><input id="member_id" type="number" name="member_id" value="' . h($fila['member_id']) . '" min="1" required>';
    echo '<label for="activity_code">Activity Code</label><input id="activity_code" type="text" name="activity_code" value="' . h($fila['activity_code']) . '" required>';
    echo '<label for="reservation_date">Date</label><input id="reservation_date" type="date" name="reservation_date" value="' . h($fila['reservation_date']) . '" required>';
    echo '<label for="price">Price</label><input id="price" type="number" name="price" value="' . h($fila['price']) . '" min="0" step="0.01" required>';
    echo '<input type="hidden" name="member_id_old" value="' . h($fila['member_id']) . '">';
    echo '<input type="hidden" name="activity_code_old" value="' . h($fila['activity_code']) . '">';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">UPDATE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Reservation does not exist.', 'cambio_res.html');
}
?>
