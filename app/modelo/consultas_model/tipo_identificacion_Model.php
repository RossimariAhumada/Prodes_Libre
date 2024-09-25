<?php
require_once MODELO_PATH . 'cnx' . DS .'CnxClass.php';
class tipo_identificacionModel extends CnxClass{
    
    public function tipos_identificacionModel() {
        $tabla = 'tipo_identificacion';
        $cnx = CnxClass::singleton_conexion();
        $cmdsql = 'SELECT * FROM ' . $tabla;
        try {
            $preparado = $cnx->preparar($cmdsql);
            if ($preparado->execute()) {
                return $preparado->fetchAll();
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
 }