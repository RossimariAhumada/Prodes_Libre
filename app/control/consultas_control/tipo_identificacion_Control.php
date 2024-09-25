<?php
require_once MODELO_PATH . 'consultas_model'. DS .  'tipo_identificacion_Model.php';
class tipo_identificacionControl { 
    private static $instancia;
  
   public static function singleton_conexion() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    public function tipos_identificacionControl() {
        $result = tipo_identificacionModel::tipos_identificacionModel();
        return $result;
    } 
}

