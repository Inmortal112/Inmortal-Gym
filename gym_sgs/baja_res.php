<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
$consulta = mysqli_query($conexion, "SELECT * FROM reservations WHERE member_id='$member_id' AND activity_code='$activity_code'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="baja_res2.php">';
    echo '<table width="700" align="center" bgcolor="#FDEBD0" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>CONFIRM DELETE RESERVATION</b></font></td></tr>';
    echo '<tr><td>Member ID</td><td><input type="text" name="member_id" value="' . $fila['member_id'] . '" readonly></td></tr>';
    echo '<tr><td>Activity Code</td><td><input type="text" name="activity_code" value="' . $fila['activity_code'] . '" readonly></td></tr>';
    echo '<tr><td>Date</td><td><input type="text" name="reservation_date" value="' . $fila['reservation_date'] . '" readonly></td></tr>';
    echo '<tr><td>Price</td><td><input type="text" name="price" value="' . $fila['price'] . '" readonly></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="DELETE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('RESERVATION DOES NOT EXIST');window.location='baja_res.html';</script>";
}
?>
