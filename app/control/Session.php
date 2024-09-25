<?php

class Session {

    public function __construct() {
        
    }

    public function iniciar() {
        @session_start();
    }

    public function setsession($nombre, $valor) {

        $_SESSION[$nombre] = $valor;
    }

    public function outsession() {
        session_unset();
        session_destroy();
    }

}