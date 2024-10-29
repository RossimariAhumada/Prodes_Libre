<?php
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_proyecto = intval($_POST['id_proyecto']);
    $nuevo_estado = intval($_POST['nuevo_estado']);

    error_log("ID Proyecto: $id_proyecto, Nuevo Estado: $nuevo_estado"); // Depuración

    // Instanciar el controlador y actualizar el estado
    $proyectoController = BancoProyectoController::singleton_conexion();
    $resultado = $proyectoController->actualizarEstadoProyecto($id_proyecto, $nuevo_estado);

    if ($resultado) {
        echo "El estado del proyecto se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado del proyecto.";
    }
}

?>
