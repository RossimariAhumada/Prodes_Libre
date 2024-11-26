<?php
// Definir constantes para simplificar las rutas
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(__DIR__ . '/../../../')); // Ruta absoluta desde el archivo actual
require_once ROOT . DS . 'app' . DS . 'config' . DS . 'configuracion.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

// Verificar que se envió el formulario correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_proyecto = filter_input(INPUT_POST, 'id_proyecto', FILTER_VALIDATE_INT);
    $nuevo_estado = filter_input(INPUT_POST, 'nuevo_estado', FILTER_VALIDATE_INT);

    if ($id_proyecto && $nuevo_estado) {
        $proyectoController = BancoProyectoController::singleton_conexion();
        $resultado = $proyectoController->actualizarEstadoProyecto($id_proyecto, $nuevo_estado);

        if ($resultado) {
            // Redirigir con éxito
            header('Location: detalle_proyecto.php?id=' . $id_proyecto . '&success=1');
            exit();
        } else {
            // Manejar error en la actualización
            header('Location: detalle_proyecto.php?id=' . $id_proyecto . '&error=1');
            exit();
        }
    } else {
        // Manejar datos no válidos
        die('Datos no válidos.');
    }
}
?>
