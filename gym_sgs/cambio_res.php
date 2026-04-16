<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_res.html', array('member_id', 'activity_code'));
$member_id = post_escapado($conexion, 'member_id');
$activity_code = post_escapado($conexion, 'activity_code');
$consulta = mysqli_query($conexion, "SELECT * FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="cambio_res2.php">';
    echo '<table width="700" align="center" bgcolor="#EAF2F8" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>EDIT RESERVATION</b></font></td></tr>';
    echo '<tr><td>Member ID</td><td><input type="text" name="member_id" value="' . htmlspecialchars($fila['member_id'], ENT_QUOTES, 'UTF-8') . '" size="10"></td></tr>';
    echo '<tr><td>Activity Code</td><td><input type="text" name="activity_code" value="' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '" size="10"></td></tr>';
    echo '<tr><td>Date</td><td><input type="text" name="reservation_date" value="' . htmlspecialchars($fila['reservation_date'], ENT_QUOTES, 'UTF-8') . '" size="15"></td></tr>';
    echo '<tr><td>Price</td><td><input type="text" name="price" value="' . htmlspecialchars($fila['price'], ENT_QUOTES, 'UTF-8') . '" size="10"></td></tr>';
    echo '<input type="hidden" name="member_id_old" value="' . htmlspecialchars($fila['member_id'], ENT_QUOTES, 'UTF-8') . '">';
    echo '<input type="hidden" name="activity_code_old" value="' . htmlspecialchars($fila['activity_code'], ENT_QUOTES, 'UTF-8') . '">';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="UPDATE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('RESERVATION DOES NOT EXIST');window.location='cambio_res.html';</script>";
}
?>
