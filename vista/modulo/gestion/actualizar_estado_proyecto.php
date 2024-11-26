<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', '..' . DS . '..' . DS . '..');
require_once '..'.DS.'..'.DS.'..'.DS.'app' . DS . 'config' . DS . 'Config.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_proyecto = $_POST['id_proyecto'] ?? null;
    $id_estado = $_POST['id_estado'] ?? null;

    if ($id_proyecto && $id_estado) {
        $proyectoController = BancoProyectoController::singleton_conexion();
        $resultado = $proyectoController->actualizarEstadoProyecto($id_proyecto, $id_estado);

        if ($resultado) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el estado.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Faltan parámetros.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
