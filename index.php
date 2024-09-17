<?php
// Establece la zona horaria predeterminada para la aplicación
date_default_timezone_set('America/Bogota');

// Define constantes que se utilizarán en la aplicación
define('DS', DIRECTORY_SEPARATOR); // Define el separador de directorios según el sistema operativo
define('ROOT', __DIR__); // Define la ruta raíz del proyecto

// Incluye los archivos de configuración y las clases necesarias para el funcionamiento de la aplicación
require_once 'app' . DS . 'config' . DS . 'configuracion.php'; // Incluye el archivo de configuración principal
require_once CONTROL_PATH . 'EnlacesClass.php'; // Incluye la clase de control de enlaces
require_once MODELO_PATH . 'EnlacesModel.php'; // Incluye la clase modelo de enlaces

// Obtiene la instancia única de la clase EnlacesClass (patrón Singleton)
$vista = EnlacesClass::singleton_enlaces();

// Llama al método plantilla para cargar la plantilla principal de la vista
$vista->plantilla();
?>