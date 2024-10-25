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
}
?>
