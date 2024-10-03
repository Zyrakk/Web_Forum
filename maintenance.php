<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- ^ ^
        (O,O)
        (   )
        -"-"-- -->
    <link rel="stylesheet" href="./assets/styles_maintenance.css">
    <title>Sitio en Mantenimiento</title>
</head>
<body>

    <div class="container">
        <div class="maintenance-icon">
            <span>🛠️</span>
        </div>
        <h1>Sitio en Mantenimiento</h1>
        <p>Estamos trabajando para mejorar tu experiencia. El sitio estará disponible en:</p>
        <div class="countdown" id="countdown">00d 00h 00m 00s</div>

        <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>

        <p>Gracias por tu paciencia.</p>
    </div>

    <?php
    $config = include('./Config/maintenance_time.php');
    ?>

    <script type="text/javascript">
        // Pasar las fechas de mantenimiento de PHP a JavaScript
        const startTime = new Date('<?php echo $config['maintenance_start']; ?>').getTime();
        const endTime = new Date('<?php echo $config['maintenance_end']; ?>').getTime();
    </script>
    <script type="text/javascript" src="./scripts/countdown.js"></script>
</body>
</html>