<?php
require_once MODELO_PATH . 'cnx' . DS .'CnxClass.php';

class BancoProyecto extends CnxClass {

    // Obtener todos los proyectos con las descripciones de ODS y estado
    public static function todosLosProyectos() {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT p.*, ep.descripcion_estado, eo.nombre_ods
                   FROM banco_proyecto p
                   JOIN estado_proyecto ep ON p.id_estado = ep.id_estado
                   JOIN entrada_ods eo ON p.id_ods = eo.id_ods';
        try {
            $preparado = $cnx->preparar($cmdsql);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Obtener los proyectos por usuario con las descripciones de ODS y estado
    public static function proyectosPorUsuario($id_usuario) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT p.*, ep.descripcion_estado, eo.nombre_ods
                   FROM banco_proyecto p
                   JOIN estado_proyecto ep ON p.id_estado = ep.id_estado
                   JOIN entrada_ods eo ON p.id_ods = eo.id_ods
                   WHERE p.id_usuario = :id_usuario';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Obtener proyectos paginados por usuario con las descripciones de ODS y estado
    public static function proyectosPaginadosPorUsuario($id_usuario, $inicio, $limite) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT p.*, ep.descripcion_estado, eo.nombre_ods
                   FROM banco_proyecto p
                   JOIN estado_proyecto ep ON p.id_estado = ep.id_estado
                   JOIN entrada_ods eo ON p.id_ods = eo.id_ods
                   WHERE p.id_usuario = :id_usuario
                   LIMIT :inicio, :limite';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $preparado->bindValue(':inicio', $inicio, PDO::PARAM_INT);
            $preparado->bindValue(':limite', $limite, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Obtener proyectos paginados sin filtrar por usuario
    public static function proyectosPaginados($inicio, $limite) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT p.*, ep.descripcion_estado, eo.nombre_ods
                   FROM banco_proyecto p
                   JOIN estado_proyecto ep ON p.id_estado = ep.id_estado
                   JOIN entrada_ods eo ON p.id_ods = eo.id_ods
                   LIMIT :inicio, :limite';
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
        }
        $cnx->closed();
        $cnx = null;
    }

    // Actualizar el estado de un proyecto
    public static function actualizarEstado($id_proyecto, $nuevo_estado) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'UPDATE banco_proyecto SET id_estado = :nuevo_estado WHERE id_proyecto = :id_proyecto';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':nuevo_estado', $nuevo_estado, PDO::PARAM_INT);
            $preparado->bindValue(':id_proyecto', $id_proyecto, PDO::PARAM_INT);
            return $preparado->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar el estado: " . $e->getMessage());
            return false;
        }
    }

    // Obtener los productos comprados por usuario
    public static function productoscompradosPorUsuario($id_usuario) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT e.nombre_prdcto, e.valor_prdcto, f.nombre_ods
                   FROM compras t
                   INNER JOIN productos e ON t.id_prdcto = e.id_prdcto
                   INNER JOIN entrada_ods f ON t.id_ods = f.id_ods
                   WHERE t.id_usuario = :id_usuario';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Obtener los productos comprados por usuario con paginación
    public static function productosPaginadosPorUsuarioC($id_usuario, $inicio, $limite) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT e.nombre_prdcto, e.valor_prdcto, f.nombre_ods, t.fecha_compra
                   FROM compras t
                   INNER JOIN productos e ON t.id_prdcto = e.id_prdcto
                   INNER JOIN entrada_ods f ON t.id_ods = f.id_ods
                   WHERE t.id_usuario = :id_usuario
                   ORDER BY t.fecha_compra DESC
                   LIMIT :inicio, :limite';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $preparado->bindValue(':inicio', $inicio, PDO::PARAM_INT);
            $preparado->bindValue(':limite', $limite, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Contar los productos comprados por usuario
    public static function contarProductosPorUsuarioC($id_usuario) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT COUNT(*) AS total FROM compras WHERE id_usuario = :id_usuario';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return $preparado->fetch()['total'];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        $cnx->closed();
        $cnx = null;
    }

    // Obtener todas las compras realizadas (sin filtrar por usuario)
public static function obtenerTodasLasCompras($inicio, $limite) {
    $cnx = CnxClass::singleton_conexion();
    $cmdsql = 'SELECT G.nombres, G.identificacion, G.correo, G.direccion, 
                      e.nombre_prdcto, e.valor_prdcto, f.nombre_ods, t.fecha_compra
               FROM compras t
               INNER JOIN productos e ON t.id_prdcto = e.id_prdcto
               INNER JOIN entrada_ods f ON t.id_ods = f.id_ods
               INNER JOIN usuarios G ON t.id_usuario = G.id_usuario
               ORDER BY t.fecha_compra DESC
               LIMIT :inicio, :limite';
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
    }
    $cnx->closed();
    $cnx = null;
}

// Contar el total de compras realizadas
public static function contarTodasLasCompras() {
    $cnx = CnxClass::singleton_conexion();
    $cmdsql = 'SELECT COUNT(*) AS total FROM compras';
    try {
        $preparado = $cnx->preparar($cmdsql);
        if ($preparado->execute()) {
            return $preparado->fetch()['total'];
        } else {
            return 0;
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
    }
    $cnx->closed();
    $cnx = null;
}

public static function obtenerProyectoPorId($id_proyecto) {
    $cnx = CnxClass::singleton_conexion();
    $cmdsql = 'SELECT p.*, ep.descripcion_estado, eo.nombre_ods
               FROM banco_proyecto p
               JOIN estado_proyecto ep ON p.id_estado = ep.id_estado
               JOIN entrada_ods eo ON p.id_ods = eo.id_ods
               WHERE p.id_proyecto = :id_proyecto';
    try {
        $preparado = $cnx->preparar($cmdsql);
        $preparado->bindValue(':id_proyecto', $id_proyecto, PDO::PARAM_INT);
        if ($preparado->execute()) {
            return $preparado->fetch();
        } else {
            return false;
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
    }
    $cnx->closed();
    $cnx = null;
}

// Contar el total de compras realizadas
public static function contarTodasLosProyectos() {
    $cnx = CnxClass::singleton_conexion();
    $cmdsql = 'SELECT COUNT(*) AS total FROM compras';
    try {
        $preparado = $cnx->preparar($cmdsql);
        if ($preparado->execute()) {
            return $preparado->fetch()['total'];
        } else {
            return 0;
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
    }
    $cnx->closed();
    $cnx = null;
}

}
?>
