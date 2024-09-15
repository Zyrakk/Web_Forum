<?php
// Configurar la fecha y hora de finalización del mantenimiento
$maintenance_end_time = strtotime('2024-09-18 18:00:00 Europe/Madrid');

// Obtener la hora actual
$current_time = time();

// Verificar si el mantenimiento ha terminado
if ($current_time < $maintenance_end_time) {
    // Redirigir a la página de mantenimiento si el mantenimiento no ha terminado
    header('Location: ../mantenimiento.html');
    exit;
}
?>