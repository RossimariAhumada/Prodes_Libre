<?php
require_once MODELO_PATH . 'cnx' . DS .'CnxClass.php';

class BancoProyecto extends CnxClass {

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

    public static function actualizarEstado($id_proyecto, $nuevo_estado) {
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'UPDATE banco_proyecto SET id_estado = :nuevo_estado WHERE id_proyecto = :id_proyecto';
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindValue(':nuevo_estado', $nuevo_estado, PDO::PARAM_INT);
            $preparado->bindValue(':id_proyecto', $id_proyecto, PDO::PARAM_INT);
            if ($preparado->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            return false;
        }
        $cnx->closed();
        $cnx = null;
    }
    
    
}
?>