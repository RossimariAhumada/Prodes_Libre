<?php
require_once MODELO_PATH . 'consultas_model' . DS . 'banco_proyecto_model.php';

class ActualizarEstadoController {
    public static function actualizarEstado($id_proyecto, $nuevo_estado) {
        // Validaciones básicas
        if (empty($id_proyecto) || empty($nuevo_estado)) {
            return ['success' => false, 'message' => 'Parámetros inválidos'];
        }

        // Llamar al modelo para actualizar el estado
        $resultado = BancoProyecto::actualizarEstado($id_proyecto, $nuevo_estado);

        if ($resultado) {
            return ['success' => true, 'message' => 'Estado actualizado correctamente'];
        } else {
            return ['success' => false, 'message' => 'Error al actualizar el estado'];
        }
    }
}
?>
