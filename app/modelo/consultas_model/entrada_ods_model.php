<?php
require_once MODELO_PATH . 'cnx' . DS .'CnxClass.php';
class entrada_ods extends CnxClass{
    
    public function entrada_ods_model() {
        $tabla = 'entrada_ods';
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