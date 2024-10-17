<?php

require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class IngresoModel extends CnxClass {

    // Método para verificar si el usuario existe en la base de datos
    public static function verificar_user($correo) {
        $cnx = CnxClass::singleton_conexion();
        $cmd = 'SELECT * FROM usuarios u, rol_usuarios r WHERE u.correo = :correo AND u.id_rol = r.codigo_rol';
        try {
            $preparado = $cnx->preparar($cmd);
            $preparado->bindParam(':correo', $correo);
            if ($preparado->execute()) {
                if ($preparado->rowCount() == 1) {
                    return $preparado->fetch(); // Usuario encontrado
                } else {
                    return false;  // Usuario no encontrado
                }
            } else {
                return false;  // Error en la ejecución de la consulta
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            $this->setError($e->getMessage());
        }
        $cnx->closed();
        $cnx = null;
    }

    // Método para verificar la contraseña usando password_verify
    public static function check_password($hash, $password) {
        return password_verify($password, $hash);
    }

    // Método para generar el hash de la contraseña al crear o actualizar usuarios
    public static function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function obtenerDatosUsuario($id_usuario) {
        $cnx = CnxClass::singleton_conexion();
        $cmd = 'SELECT u.nombres, r.descripcion, u.id_rol FROM usuarios u INNER JOIN rol_usuarios r ON u.id_rol = r.codigo_rol WHERE u.id_usuario = :id_usuario';
        try {
            $preparado = $cnx->preparar($cmd);
            $preparado->bindParam(':id_usuario', $id_usuario);
            if ($preparado->execute()) {
                if ($preparado->rowCount() == 1) {
                    return $preparado->fetch(); // Incluye el rol del usuario
                } else {
                    return false;
                }
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