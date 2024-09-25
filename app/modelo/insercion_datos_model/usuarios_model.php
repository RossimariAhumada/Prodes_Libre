<?php
require_once MODELO_PATH . 'cnx' . DS . 'CnxClass.php';

class guardar_usuario_model extends CnxClass {

    // Constructor de la clase
    public function __construct() {
        // Inicialización o lógica del constructor aquí
    }

   // Validar si el usuario existe mi modelo
   public function validarUsuarioModel($usuario) {
    $tabla = 'usuarios';
    $cnx = CnxClass::singleton_conexion();
    $cmdsql = 'SELECT * FROM '. $tabla .' WHERE correo = :u';

    try {
        $preparado = $cnx->preparar($cmdsql);
        $preparado->bindParam(':u', $usuario);

        $preparado->execute();
        if ($preparado->fetch()) {
            return ['status' => 0, 'message' => 'Usuario registrado correctamente'];
        } else {
            return ['status' => 1, 'message' => 'El correo ya existe'];
        }

    } catch (PDOException $e) {
        error_log($e->getMessage()); // Registrar el error
        return ['status' => -1, 'message' => 'Error en el servidor'];
    }
}

    public function guardar_usuario_model($datos) {
        $tabla = 'usuarios';
        $cnx = CnxClass::singleton_conexion();
    
        // Verifica que todos los datos necesarios estén presentes
        if (empty($datos['identificacion']) || empty($datos['nombres']) || empty($datos['correo']) || empty($datos['password']) || empty($datos['telefono']) || empty($datos['direccion']) || empty($datos['id_identificacion'])) {
            return array('rsl' => FALSE);
        }
    
        // Agregar id_rol con valor por defecto de 2
        $datos['id_rol'] = 2;
    
        $cmdsql = 'INSERT INTO ' . $tabla . ' (identificacion, nombres, correo, password, telefono, direccion, id_identificacion, id_rol) 
                   VALUES (:a, :i, :f, :r, :d, :c, :e, :rol)';
    
        try {
            $preparado = $cnx->preparar($cmdsql);
            $preparado->bindParam(':a', $datos['identificacion'], PDO::PARAM_STR);
            $preparado->bindParam(':i', $datos['nombres'], PDO::PARAM_STR);
            $preparado->bindParam(':f', $datos['correo'], PDO::PARAM_STR);
            $preparado->bindParam(':r', $datos['password'], PDO::PARAM_STR);
            $preparado->bindParam(':d', $datos['telefono'], PDO::PARAM_STR);
            $preparado->bindParam(':c', $datos['direccion'], PDO::PARAM_STR);
            $preparado->bindParam(':e', $datos['id_identificacion'], PDO::PARAM_STR);
            $preparado->bindParam(':rol', $datos['id_rol'], PDO::PARAM_INT);
    
            if ($preparado->execute()) {
                $id = $cnx->ultimoIngreso($tabla);
                return array('rsl' => TRUE, 'id_usuario' => $id);
            } else {
                return array('rsl' => FALSE);
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            return array('rsl' => FALSE);
        } finally {
            $cnx = null; // Cierra la conexión
        }
    }
}
?>