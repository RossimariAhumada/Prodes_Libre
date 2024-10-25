<?php
require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class proyecto_model extends CnxClass {

    // Método para guardar un proyecto
    public static function guardar_proyecto_model($datos) {
        $tabla = 'banco_proyecto';
        $cnx = CnxClass::singleton_conexion(); // Obtener la conexión

        // Verificar si ya existe un registro con el mismo nombre del proyecto
        $checkSql = 'SELECT COUNT(*) as total FROM ' . $tabla . ' WHERE nombre_proyecto = :nombre';
        try {
            $preparado = $cnx->preparar($checkSql);
            $preparado->bindValue(':nombre', $datos['nombre_proyecto'], PDO::PARAM_STR);
            $preparado->execute();
            $resultado = $preparado->fetch(PDO::FETCH_ASSOC);

            // Si ya existe un registro con el mismo nombre, devolver false o mostrar un mensaje
            if ($resultado['total'] > 0) {
                return array('rsl' => FALSE, 'mensaje' => 'Ya existe un proyecto con ese nombre');
            }

            // Si no existe, proceder con la inserción
            $cmdsql = 'INSERT INTO ' . $tabla . ' (nombre_proyecto, descripcion_proyecto, documento_adjunto, fecha_inicio, fecha_final, presupuesto, resultados_esperados, ubicacion, id_ods, id_usuario, id_estado)
                        VALUES (:nombre, :descripcion, :documento_adjunto, :fecha_inicio, :fecha_final, :presupuesto, :resultados_esperados, :ubicacion, :id_ods, :id_usuario, :id_estado)';
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':nombre', $datos['nombre_proyecto'], PDO::PARAM_STR);
            $preparado->bindValue(':descripcion', $datos['descripcion_proyecto'], PDO::PARAM_STR);
            $preparado->bindValue(':documento_adjunto', $datos['documento_adjunto'], PDO::PARAM_STR);
            $preparado->bindValue(':fecha_inicio', $datos['fecha_inicio'], PDO::PARAM_STR);
            $preparado->bindValue(':fecha_final', $datos['fecha_final'], PDO::PARAM_STR);
            $preparado->bindValue(':presupuesto', $datos['presupuesto'], PDO::PARAM_STR);
            $preparado->bindValue(':resultados_esperados', $datos['resultados_esperados'], PDO::PARAM_STR);
            $preparado->bindValue(':ubicacion', $datos['ubicacion'], PDO::PARAM_STR);
            $preparado->bindValue(':id_ods', $datos['id_ods'], PDO::PARAM_INT);
            $preparado->bindValue(':id_usuario', $_SESSION['id_usuario'], PDO::PARAM_INT);  // Asumiendo que el ID del usuario está en la sesión
            $preparado->bindValue(':id_estado', 1, PDO::PARAM_INT);  // Estado por defecto

            if ($preparado->execute()) {
                $id = $cnx->ultimoIngreso($tabla);
                return array('rsl' => TRUE, 'id_proyecto' => $id);
            } else {
                return array('rsl' => FALSE, 'mensaje' => 'Error al guardar el proyecto');
            }
        } catch (PDOException $e) {
            return array('rsl' => FALSE, 'mensaje' => 'Error: ' . $e->getMessage());
        } finally {
            // Asegúrate de cerrar la conexión
            $cnx->cerrarConexion();
        }
    }
}
?>
