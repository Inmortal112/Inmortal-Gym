<?php
function conectar() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "inmortal";
    $conexion = mysqli_connect($servidor, $usuario, $password, $bd) or die("ERROR CONNECTING TO SERVER");
    mysqli_set_charset($conexion, "utf8mb4");
    return $conexion;
}

function redirigir_si_no_post($destino, $campos = array()) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . $destino);
        exit;
    }

    foreach ($campos as $campo) {
        if (!isset($_POST[$campo]) || $_POST[$campo] === '') {
            header('Location: ' . $destino);
            exit;
        }
    }
}

function post_escapado($conexion, $campo) {
    return mysqli_real_escape_string($conexion, isset($_POST[$campo]) ? $_POST[$campo] : '');
}

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

function render_subpage_inicio($titulo, $subtitulo = '') {
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>' . h($titulo) . ' - INMORTAL GYM</title>';
    echo '<link rel="stylesheet" href="subpages.css?v=3">';
    echo '</head>';
    echo '<body class="subpage">';
    echo '<main class="page">';
    echo '<section class="panel">';
    echo '<span class="eyebrow">INMORTAL GYM / CONTROL CENTER</span>';
    echo '<h1 class="page-title">' . h($titulo) . '</h1>';
    if ($subtitulo !== '') {
        echo '<p class="page-subtitle">' . h($subtitulo) . '</p>';
    }
}

function render_subpage_fin() {
    echo '<a class="back-link" href="index.html">Back to home</a>';
    echo '</section>';
    echo '</main>';
    echo '</body>';
    echo '</html>';
}

function normalizar_imagen_actividad($nombre) {
    $limpio = trim((string)$nombre);
    $mapa = array(
        'boxing.jpg' => 'sammino-baby-8035364_1920.jpg',
        'functional.jpg' => 'pexels-northern-28300372.jpg',
        'spinning.jpg' => 'people-doing-indoor-cycling.jpg'
    );
    $clave = strtolower($limpio);
    return isset($mapa[$clave]) ? $mapa[$clave] : $limpio;
}

function redirigir_con_feedback($estado, $mensaje, $destino) {
    $estilo = 'notice';
    $titulo = 'NOTICE';
    if ($estado === 'success') {
        $estilo = 'success';
        $titulo = 'SUCCESS';
    } elseif ($estado === 'error') {
        $estilo = 'error';
        $titulo = 'ERROR';
    }

    $destino_js = json_encode($destino);
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>' . h($titulo) . ' - INMORTAL GYM</title>';
    echo '<link rel="stylesheet" href="subpages.css?v=3">';
    echo '</head>';
    echo '<body class="subpage">';
    echo '<main class="page">';
    echo '<section class="panel panel-feedback ' . h($estilo) . '">';
    echo '<span class="eyebrow">INMORTAL GYM / CONTROL CENTER</span>';
    echo '<h1 class="page-title">' . h($titulo) . '</h1>';
    echo '<p class="page-subtitle">' . h($mensaje) . '</p>';
    echo '<p class="feedback-hint">Redirecting in a moment...</p>';
    echo '<a class="back-link" href="' . h($destino) . '">Continue now</a>';
    echo '</section>';
    echo '</main>';
    echo '<script>setTimeout(function(){ window.location = ' . $destino_js . '; }, 1300);</script>';
    echo '</body>';
    echo '</html>';
    exit;
}
?>
