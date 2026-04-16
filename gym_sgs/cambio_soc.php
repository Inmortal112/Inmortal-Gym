<?php
include('conexion.php');
$conexion = conectar();
redirigir_si_no_post('cambio_soc.html', array('member_id'));
$member_id = post_escapado($conexion, 'member_id');
$consulta = mysqli_query($conexion, "SELECT * FROM members WHERE member_id='$member_id'");
if ($fila = mysqli_fetch_array($consulta)) {
    echo '<form method="post" action="cambio_soc2.php">';
    echo '<table width="600" align="center" bgcolor="#E3F7D9" cellpadding="10" cellspacing="0" border="0">';
    echo '<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>EDIT MEMBER</b></font></td></tr>';
    echo '<tr><td>Member ID</td><td><input type="text" name="member_id" value="' . htmlspecialchars($fila['member_id'], ENT_QUOTES, 'UTF-8') . '" readonly></td></tr>';
    echo '<tr><td>Name</td><td><input type="text" name="name" value="' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '" size="40"></td></tr>';
    echo '<tr><td>Age</td><td><input type="text" name="age" value="' . htmlspecialchars($fila['age'], ENT_QUOTES, 'UTF-8') . '" size="10"></td></tr>';
    echo '<tr><td>Phone</td><td><input type="text" name="phone" value="' . htmlspecialchars($fila['phone'], ENT_QUOTES, 'UTF-8') . '" size="20"></td></tr>';
    echo '<tr><td colspan="2" align="center"><input type="submit" value="UPDATE"></td></tr>';
    echo '</table></form>';
} else {
    echo "<script>alert('MEMBER DOES NOT EXIST');window.location='cambio_soc.html';</script>";
}
?>
