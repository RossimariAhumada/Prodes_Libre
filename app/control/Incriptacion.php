<?php
class Hash {
    private static $pez='$2a';
    //parametro de costo
    private static $costo='$10';
    
    //salt unica
    public function unique_salt(){
        return substr(sha1(mt_rand()),0,22);
    }
    //general el hast con la sal y el pez globo
    public function hashpass($pass){
        return crypt($pass,self::$pez.self::$costo.'$'.self::unique_salt());
    }
   //verificar la contraseña y el hasth
   public function verificar_password($hashDB,$pass){
       $sal_completa = substr($hasth,0,29);
       $nuevo_hash = crypt($pass,$sal_completa);
       return ($hashDB==$nuevo_hash);
   }
}   
?>