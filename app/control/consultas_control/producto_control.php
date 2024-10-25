<?php
require_once MODELO_PATH . 'consultas_model' . DS . 'producto_model.php';

class ProductoController {
    private static $instancia;

    // Implementación del patrón Singleton
    public static function singleton_conexion() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    // Método para obtener todos los productos
    public function obtenerProductos() {
        $result = Producto::producto_model(); // Llamar al modelo
        return $result;
    }

    // Obtener productos paginados
    public function obtenerProductosPaginados($inicio, $limite) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT * FROM productos LIMIT :inicio, :limite';
        $preparado = $cnx->preparar($cmdsql);
        $preparado->bindValue(':inicio', $inicio, PDO::PARAM_INT);
        $preparado->bindValue(':limite', $limite, PDO::PARAM_INT);
        $preparado->execute();
        return $preparado->fetchAll();
    }

    // Obtener el número total de productos
    public function contarProductos() {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT COUNT(*) as total FROM productos';
        $preparado = $cnx->preparar($cmdsql);
        $preparado->execute();
        $resultado = $preparado->fetch();
        return $resultado['total'];
    }
}
?>
