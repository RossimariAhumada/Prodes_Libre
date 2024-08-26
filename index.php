<?php
date_default_timezone_set('America/Bogota');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);
require_once 'app' . DS . 'config' . DS . 'configuracion.php';
require_once CONTROL_PATH . 'EnlacesClass.php';
require_once MODELO_PATH . 'EnlacesModel.php';
$vista = EnlacesClass::singleton_enlaces();
$vista->plantilla();
?>