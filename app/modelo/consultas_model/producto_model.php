<?php
require_once MODELO_PATH . 'cnx' . DS .'CnxClass.php';

class Producto extends CnxClass {

    // Obtener todos los productos
    public static function producto_model() {
        $tabla = 'productos';
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT * FROM ' . $tabla;
        try {
            $preparado = $cnx->preparar($cmdsql);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            $this->setError($e->getMessage());
        }
        $cnx->closed();
        $cnx = null;
    }
    
    // Obtener productos con paginación
    public static function productosPaginados($inicio, $limite) {
        $tabla = 'productos';
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT * FROM ' . $tabla . ' LIMIT :inicio, :limite';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':inicio', $inicio, PDO::PARAM_INT);
            $preparado->bindValue(':limite', $limite, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            $this->setError($e->getMessage());
        }
        $cnx->closed();
        $cnx = null;
    }
    public static function obtenerDatosProducto($id_prdcto) {
        $cnx = CnxClass::singleton_conexion();
        $cmd = 'SELECT u.id_prdcto,u.nombre_prdcto, u.valor_prdcto, u.descripcion_prdcto, r.nombre_ods,r.id_ods 
                FROM productos u 
                INNER JOIN entrada_ods r ON u.id_ods = r.id_ods 
                WHERE u.id_prdcto = :id_prdcto';
        try {
            $preparado = $cnx->preparar($cmd);
            $preparado->bindParam(':id_prdcto', $id_prdcto, PDO::PARAM_INT);
            if ($preparado->execute()) {
                if ($preparado->rowCount() == 1) {
                    return $preparado->fetch(PDO::FETCH_ASSOC); // Devuelve los datos del producto
                } else {
                    return false; // No se encontró el producto
                }
            } else {
                return false; // Error al ejecutar la consulta
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            return false; // Manejo del error
        } finally {
            $cnx = null;
        }
    }
}


?>
