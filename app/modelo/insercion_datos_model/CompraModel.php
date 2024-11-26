<?php
require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class CompraModel {
    public static function guardar_compra_model($valores) {
        try {
            // Obtener la instancia de conexión
            $cnx = CnxClass::singleton_conexion();

            // Preparar la consulta SQL
            $sql = "INSERT INTO compras (id_usuario, id_prdcto, id_ods, valor_prdcto) 
                    VALUES (:id_usuario, :id_producto, :id_ods, :valor)";
            $stmt = $cnx->preparar($sql);

            // Vincular los valores con los parámetros de la consulta
            $stmt->bindParam(':id_usuario', $valores['id_usuario'], PDO::PARAM_INT);
            $stmt->bindParam(':id_producto', $valores['id_producto'], PDO::PARAM_INT);
            $stmt->bindParam(':id_ods', $valores['id_ods'], PDO::PARAM_INT);
            $stmt->bindParam(':valor', $valores['valor'], PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return ['rsl' => true];
            } else {
                return ['rsl' => false, 'mensaje' => 'No se pudo guardar la compra.'];
            }
        } catch (PDOException $e) {
            return ['rsl' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
}
?>
