<?php
// Define la URL base del proyecto
define('BASE_URL', 'http://192.168.137.1/Prodes_Libre/');
// define('BASE_URL', 'http://192.168.137.81/Prodes_Libre/'); // URL alternativa comentada, útil para pruebas o cambios de servidor

// Define la ruta pública del proyecto, que contiene los recursos accesibles desde el navegador
define('PUBLIC_PATH', BASE_URL . 'public/');

// Define la ruta de los módulos de Node.js
define('PUBLIC_PATH_NODES', BASE_URL . 'node_modules/');

// Define el módulo por defecto al acceder a la aplicación
define('DEFAULT_MODULO', 'inicio');

// Define la página por defecto (actualmente está vacía)
define('DEFAULT_PAGE', '');

// Define la ruta de las vistas dentro del sistema de archivos
define('VISTA_PATH', ROOT . DS . 'vista' . DS);

// Define la ruta de los controladores dentro del sistema de archivos
define('CONTROL_PATH', ROOT . DS . 'app' . DS . 'control' . DS);

// Define la ruta de los modelos dentro del sistema de archivos
define('MODELO_PATH', ROOT . DS . 'app' . DS . 'modelo' . DS);

// Define la ruta de las librerías públicas dentro del sistema de archivos
define('LIB_PATH', ROOT . DS . 'public' . DS . 'lib' . DS);
?>
