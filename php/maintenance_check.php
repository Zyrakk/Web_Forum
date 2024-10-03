<?php
// Configurar la zona horaria
date_default_timezone_set('Europe/Madrid');

$config = include('../Config/maintenance_time.php');

// Obtener la hora actual
$current_time = new DateTime();

// Convertir las fechas de mantenimiento a objetos DateTime
$maintenance_start = new DateTime($config['maintenance_start']);
$maintenance_end = new DateTime($config['maintenance_end']);

// Verificar si estamos en el período de mantenimiento
if ($current_time >= $maintenance_start && $current_time <= $maintenance_end) {
    echo "Mantenimiento en progreso";  // Solo para depuración
    header('Location: /maintenance.html');
    exit;
} else {
    echo "No";
}