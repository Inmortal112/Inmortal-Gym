<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('baja_soc.html', array('member_id'));
$member_id = post_escapado($conexion, 'member_id');
$consulta = mysqli_query($conexion, "SELECT * FROM members WHERE member_id='$member_id'");
if ($fila = mysqli_fetch_array($consulta)) {
    render_subpage_inicio('Confirm Delete Member', 'Review member data before deleting');
    echo '<form method="post" action="baja_soc2.php" class="form-grid">';
    echo '<label for="member_id">Member ID</label><input id="member_id" type="text" name="member_id" value="' . h($fila['member_id']) . '" readonly>';
    echo '<label for="name">Name</label><input id="name" type="text" name="name" value="' . h($fila['name']) . '" readonly>';
    echo '<label for="age">Age</label><input id="age" type="text" name="age" value="' . h($fila['age']) . '" readonly>';
    echo '<label for="phone">Phone</label><input id="phone" type="text" name="phone" value="' . h($fila['phone']) . '" readonly>';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">DELETE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Member does not exist.', 'baja_soc.html');
}
?>
