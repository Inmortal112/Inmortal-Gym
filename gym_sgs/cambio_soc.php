<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_soc.html', array('member_id'));
$member_id = post_escapado($conexion, 'member_id');
$consulta = mysqli_query($conexion, "SELECT * FROM members WHERE member_id='$member_id'");
if ($fila = mysqli_fetch_array($consulta)) {
    render_subpage_inicio('Edit Member', 'Update existing member information');
    echo '<form method="post" action="cambio_soc2.php" class="form-grid">';
    echo '<label for="member_id">Member ID</label><input id="member_id" type="text" name="member_id" value="' . h($fila['member_id']) . '" readonly>';
    echo '<label for="name">Name</label><input id="name" type="text" name="name" value="' . h($fila['name']) . '" required>';
    echo '<label for="age">Age</label><input id="age" type="number" name="age" value="' . h($fila['age']) . '" min="1" required>';
    echo '<label for="phone">Phone</label><input id="phone" type="text" name="phone" value="' . h($fila['phone']) . '" required>';
    echo '<div class="form-actions"><button class="btn btn-primary" type="submit">UPDATE</button></div>';
    echo '</form>';
    render_subpage_fin();
} else {
    redirigir_con_feedback('error', 'Member does not exist.', 'cambio_soc.html');
}
?>
