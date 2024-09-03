<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prodes Libre</title>
    <link rel="shorcut icon" href="<?php echo PUBLIC_PATH; ?>img/icono.png" />
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/styles.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/main.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/responsy.css" />
</head>

<body>
    <?php
    require_once CONTROL_PATH . 'EnlacesClass.php';
    $vista = EnlacesClass::singleton_enlaces();
    $vista->enlacesPaginasControl();
    ?>
    <script src="<?php echo PUBLIC_PATH_NODES; ?>bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>