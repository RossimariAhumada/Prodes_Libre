<?php

require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class IngresoModel extends CnxClass {

    public static function verificar_user($nick) {
        $cnx = CnxClass::singleton_conexion();
        $cmd = 'SELECT * FROM usuarios u, id_rol r WHERE u.correo = :x AND u.id_rol = r.codigo_rol';
        try {
            $preparado = $cnx->preparar($cmd);
            $preparado->bindParam(':x', $nick);
            if ($preparado->execute()) {
                if ($preparado->rowCount() == 1) {
                    return $preparado->fetch();
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            $this->setError($e->getMessage());
        }
        $cnx->closed();
        $cnx = null;
    }

    public static function check_password($hash, $password) {
        $full_salt = substr($hash, 0, 29);
        $new_hash = crypt($password, $full_salt);
        return ($hash == $new_hash);
    }

}
