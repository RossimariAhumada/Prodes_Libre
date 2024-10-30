<?php
require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class actividad_model extends CnxClass {

    // Método para guardar una actividad
    public static function guardar_actividad_model($datos) {
        $tabla = 'actividad';
        $cnx = CnxClass::singleton_conexion(); // Obtener la conexión

        // Verificar si ya existe un registro con el mismo nombre de actividad
        $checkSql = 'SELECT COUNT(*) as total FROM ' . $tabla . ' WHERE nombre_actividad = :nombre';
        try {
            $preparado = $cnx->preparar($checkSql);
            $preparado->bindValue(':nombre', $datos['nombre_actividad'], PDO::PARAM_STR);
            $preparado->execute();
            $resultado = $preparado->fetch(PDO::FETCH_ASSOC);

            // Si ya existe un registro con el mismo nombre, devolver false o mostrar un mensaje
            if ($resultado['total'] > 0) {
                return array('rsl' => FALSE, 'mensaje' => 'Ya existe una actividad con ese nombre');
            }

            // Si no existe, proceder con la inserción
            $cmdsql = 'INSERT INTO ' . $tabla . ' (nombre_actividad, descripcion_actividad, detalle_actividad, fecha_inicio, fecha_final, participantes, id_ods, foto)
                        VALUES (:nombre, :descripcion, :detalle, :fecha_inicio, :fecha_final, :participantes, :id_ods, :imagen)';
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':nombre', $datos['nombre_actividad'], PDO::PARAM_STR);
            $preparado->bindValue(':descripcion', $datos['descripcion_actividad'], PDO::PARAM_STR);
            $preparado->bindValue(':detalle', $datos['detalle_actividad'], PDO::PARAM_STR);
            $preparado->bindValue(':fecha_inicio', $datos['fecha_inicio'], PDO::PARAM_STR);
            $preparado->bindValue(':fecha_final', $datos['fecha_final'], PDO::PARAM_STR);
            $preparado->bindValue(':participantes', $datos['participantes'], PDO::PARAM_INT);
            $preparado->bindValue(':id_ods', $datos['id_ods'], PDO::PARAM_INT);
            $preparado->bindValue(':imagen', $datos['imagen_actividad'], PDO::PARAM_STR);

            if ($preparado->execute()) {
                $id = $cnx->ultimoIngreso($tabla);
                return array('rsl' => TRUE, 'id_actividad' => $id);
            } else {
                return array('rsl' => FALSE, 'mensaje' => 'Error al guardar la actividad');
            }
        } catch (PDOException $e) {
            return array('rsl' => FALSE, 'mensaje' => 'Error: ' . $e->getMessage());
        } finally {
            $cnx->cerrarConexion();
        }
    }
}
?>