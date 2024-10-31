<?php
session_start();

include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'ingreso_control.php';
require_once CONTROL_PATH . 'Session.php';

// Obtener los datos del usuario desde el controlador
$menuControl = IngresoControl::singleton_ingreso();
$usuario = $menuControl->mostrarMenuUsuario();

if ($usuario['id_rol'] == 1): // Administrador 
    include_once VISTA_PATH . 'modulo' . DS . 'gestion' . DS . 'banco_proyecto_gestion.php';
endif; 

if ($usuario['id_rol'] == 2): // Visitante 
    include_once VISTA_PATH . 'modulo' . DS . 'tienda' . DS . 'producto_login_inicio.php';
endif;  
?>