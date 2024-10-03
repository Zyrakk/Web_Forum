<?php
// Configurar la zona horaria
date_default_timezone_set('Europe/Madrid');

$config = include('../config.php');

// Obtener la hora actual
$current_time = new DateTime();

//     ^ ^
//    (O,O)
//    (   )
//    -"-"--

// Convertir las fechas de mantenimiento a objetos DateTime
$maintenance_start = new DateTime($config['maintenance_start']);
$maintenance_end = new DateTime($config['maintenance_end']);

// Verificar si estamos en el período de mantenimiento
if ($current_time->getTimestamp() >= $maintenance_start->getTimestamp() &&
    $current_time->getTimestamp() <= $maintenance_end->getTimestamp()) {
    header('Location: /maintenance.php');
    exit;
}
?>
