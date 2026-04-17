<?php
include('conexion.php');
$conexion = conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    redirigir_si_no_post('alta_act.php', array('activity_code', 'name', 'trainer_id', 'schedule', 'image'));
    $activity_code = post_escapado($conexion, 'activity_code');
    $name = post_escapado($conexion, 'name');
    $trainer_id = post_escapado($conexion, 'trainer_id');
    $schedule = post_escapado($conexion, 'schedule');
    $image = normalizar_imagen_actividad(post_escapado($conexion, 'image'));
    $consulta = mysqli_query($conexion, "INSERT INTO activities (activity_code, name, trainer_id, schedule, image) VALUES ('$activity_code', '$name', '$trainer_id', '$schedule', '$image')");
    if ($consulta) {
        redirigir_con_feedback('success', 'Data saved successfully.', 'consulta_act.php');
    } else {
        redirigir_con_feedback('error', 'Error saving data.', 'alta_act.php');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Activities</title>
<link rel="stylesheet" href="subpages.css?v=3">
</head>
<body class="subpage">
<main class="page">
<section class="panel">
<span class="eyebrow">INMORTAL GYM / CONTROL CENTER</span>
<h1 class="page-title">NEW ACTIVITY</h1>
<form method="post" action="alta_act.php" class="form-grid">
<label for="activity_code">Code</label><input id="activity_code" type="text" name="activity_code" required>
<label for="name">Name</label><input id="name" type="text" name="name" required>
<label for="trainer_id">Trainer</label>
<select id="trainer_id" name="trainer_id" required>
<?php
$trainers = mysqli_query($conexion, "SELECT trainer_id, name FROM personal_trainers ORDER BY trainer_id");
while ($trainer = mysqli_fetch_array($trainers)) {
    echo '<option value="' . htmlspecialchars($trainer['trainer_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($trainer['trainer_id'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($trainer['name'], ENT_QUOTES, 'UTF-8') . '</option>';
}
?>
</select>
<label for="schedule">Schedule</label><input id="schedule" type="text" name="schedule" required>
<label for="image">Image</label><input id="image" type="text" name="image" list="activity_images" required>
<datalist id="activity_images">
    <option value="sammino-baby-8035364_1920.jpg"></option>
    <option value="pexels-northern-28300372.jpg"></option>
    <option value="people-doing-indoor-cycling.jpg"></option>
</datalist>
<div class="form-actions"><button class="btn btn-primary" type="submit">SAVE</button><button class="btn" type="reset">CLEAR</button></div>
</form>
<a class="back-link" href="index.html">Back to home</a>
</section>
</main>
</body>
</html>
