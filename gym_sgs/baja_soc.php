<?php
include('conexion.php');
$conexion = conectar();
$member_id = mysqli_real_escape_string($conexion, $_POST['member_id']);
$consulta = mysqli_query($conexion, "SELECT * FROM members WHERE member_id='$member_id'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="baja_soc2.php">';
    echo '<table width="600" align="center" bgcolor="#F7E1D9" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>CONFIRM DELETE MEMBER</b></font></td></tr>';
    echo '<tr><td>Member ID</td><td><input type="text" name="member_id" value="' . $fila['member_id'] . '" readonly></td></tr>';
    echo '<tr><td>Name</td><td><input type="text" name="name" value="' . $fila['name'] . '" readonly></td></tr>';
    echo '<tr><td>Age</td><td><input type="text" name="age" value="' . $fila['age'] . '" readonly></td></tr>';
    echo '<tr><td>Phone</td><td><input type="text" name="phone" value="' . $fila['phone'] . '" readonly></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="DELETE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('MEMBER DOES NOT EXIST');window.location='baja_soc.html';</script>";
}
?>
