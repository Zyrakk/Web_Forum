<?php
// Configurar la zona horaria
date_default_timezone_set('Europe/Madrid');

$config = include('../config.php');

// Obtener la hora actual
$current_time = new DateTime();

// Convertir las fechas de mantenimiento a objetos DateTime
$maintenance_start = new DateTime($config['maintenance_start']);
$maintenance_end = new DateTime($config['maintenance_end']);

// Verificar si estamos en el período de mantenimiento
if ($current_time >= $maintenance_start && $current_time <= $maintenance_end) {
    // Redirigir a la página de mantenimiento si estamos en mantenimiento
    echo "Estamos en mantenimiento. Redirigiendo...";
    header('Location: /maintenance.html');
    exit;
} else {
    echo "No estamos en mantenimiento.";
}
?>
