<?php
require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class producto_model extends CnxClass {

    // Método para guardar un producto
    public function guardar_producto_model($datos) {
        $tabla = 'productos';
        $cnx = CnxClass::singleton_conexion(); // Obtener la conexión

        // Verificar si ya existe un registro con el mismo nombre del producto
        $checkSql = 'SELECT COUNT(*) as total FROM ' . $tabla . ' WHERE nombre_prdcto = :nombre';
        try {
            $preparado = $cnx->preparar($checkSql);
            $preparado->bindParam(':nombre', $datos['nombre_prdcto'], PDO::PARAM_STR);
            $preparado->execute();
            $resultado = $preparado->fetch(PDO::FETCH_ASSOC);

            // Si ya existe un registro con el mismo nombre, devolver false o mostrar un mensaje
            if ($resultado['total'] > 0) {
                return array('rsl' => FALSE, 'mensaje' => 'Ya existe un producto con ese nombre');
            }

            // Si no existe, proceder con la inserción
            $cmdsql = 'INSERT INTO ' . $tabla . ' (nombre_prdcto, valor_prdcto, descripcion_prdcto, foto, id_ods) VALUES (:nombre, :valor, :descripcion, :foto, :id_ods)';
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindParam(':nombre', $datos['nombre_prdcto'], PDO::PARAM_STR);
            $preparado->bindParam(':valor', $datos['valor_prdcto'], PDO::PARAM_STR);
            $preparado->bindParam(':descripcion', $datos['descripcion_prdcto'], PDO::PARAM_STR);
            $preparado->bindParam(':foto', $datos['foto'], PDO::PARAM_STR);
            $preparado->bindParam(':id_ods', $datos['id_ods'], PDO::PARAM_STR);

            if ($preparado->execute()) {
                $id = $cnx->ultimoIngreso($tabla);
                return array('rsl' => TRUE, 'id_prdcto' => $id);
            } else {
                return array('rsl' => FALSE, 'mensaje' => 'Error al guardar el producto');
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
