<?php
require_once MODELO_PATH . 'consultas_model'. DS .  'entrada_ods_model.php';
class entrada_ods_control { 
    private static $instancia;
  
   public static function singleton_conexion() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    public function tipo_entrada_ods() {
        $result = entrada_ods::entrada_ods_model();
        return $result;
    } 
}

