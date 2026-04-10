<?php
include('conexion.php');
$conexion = conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity_code = mysqli_real_escape_string($conexion, $_POST['activity_code']);
    $name = mysqli_real_escape_string($conexion, $_POST['name']);
    $trainer_id = mysqli_real_escape_string($conexion, $_POST['trainer_id']);
    $schedule = mysqli_real_escape_string($conexion, $_POST['schedule']);
    $image = mysqli_real_escape_string($conexion, $_POST['image']);
    $consulta = mysqli_query($conexion, "INSERT INTO activities (activity_code, name, trainer_id, schedule, image) VALUES ('$activity_code', '$name', '$trainer_id', '$schedule', '$image')");
    if ($consulta) {
        echo "<script>alert('DATA SAVED SUCCESSFULLY');window.location='consulta_act.php';</script>";
    } else {
        echo "<script>alert('ERROR SAVING DATA');window.location='alta_act.php';</script>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Activities</title>
</head>
<body>
<form method="post" action="alta_act.php">
<table width="600" align="center" bgcolor="#F3E5FF" cellpadding="10" cellspacing="0" border="0">
<tr><td colspan="2" align="center"><font face="Arial" size="5"><b>NEW ACTIVITY</b></font></td></tr>
<tr><td>Code</td><td><input type="text" name="activity_code" size="10"></td></tr>
<tr><td>Name</td><td><input type="text" name="name" size="40"></td></tr>
<tr><td>Trainer</td><td>
<select name="trainer_id" required>
<?php
$trainers = mysqli_query($conexion, "SELECT trainer_id, name FROM personal_trainers ORDER BY trainer_id");
while ($trainer = mysqli_fetch_array($trainers)) {
    echo '<option value="' . $trainer['trainer_id'] . '">' . $trainer['trainer_id'] . ' - ' . htmlspecialchars($trainer['name'], ENT_QUOTES, 'UTF-8') . '</option>';
}
?>
</select>
</td></tr>
<tr><td>Schedule</td><td><input type="text" name="schedule" size="40"></td></tr>
<tr><td>Image</td><td><input type="text" name="image" size="30"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="SAVE"><input type="reset" value="CLEAR"></td></tr>
</table>
</form>
</body>
</html>
