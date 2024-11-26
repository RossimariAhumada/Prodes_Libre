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

// Método para obtener los datos de un producto en base a su ID
public function mostrarProducto($id_prdcto) {
    $cnx = CnxClass::singleton_conexion();
    // Verificar si el producto existe
    if ($id_prdcto) {
        // Cambiar ProductoModel por Producto (que es el nombre correcto de tu clase)
        $datosProducto = Producto::obtenerDatosProducto($id_prdcto); 
        if ($datosProducto) {
            return $datosProducto; // Devuelve los datos del producto
        } else {
            // Producto no encontrado
            header('Location: ' . BASE_URL . 'inicio'); // Redirige si no encuentra el producto
            exit();
        }
    } else {
        // Si no se pasa el id del producto
        header('Location: ' . BASE_URL . 'inicio');
        exit();
    }
}
    // Evitar la clonación del objeto
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
?>
