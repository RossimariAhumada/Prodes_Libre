<?php
require_once MODELO_PATH . 'consultas_model'. DS .  'ingreso_model.php';
require_once CONTROL_PATH . 'Session.php';

class ingresoClass {

    private static $instancia;
    private $objsession;

    public static function singleton_ingreso() {

        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;

            self::$instancia = new $miclase;
        }

        return self::$instancia;
    }

    public function ingresar() {
        if (isset($_POST['email']) &&
                !empty($_POST['email']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['email']) &&
                isset($_POST['password']) &&
                !empty($_POST['password']) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])
        ) {
            $user = $_POST['email'];
            $pass = $_POST['password'];
            $rslt = IngresoModel::verificar_user($user);
            if ($rslt) {
                if ($rslt['correo'] === $user) {
                    $hash = $rslt['password'];
                    if (IngresoModel::check_password($hash, $pass)) {
                        $this->objsession = new Session;
                        $this->objsession->iniciar();
                        $this->objsession->setsession('id_usuario', $rslt['id_usuario']);
                        $this->objsession->setsession('correo', $rslt['correo']);
                        $this->objsession->setsession('nombres', $rslt['nombres']);
                        $this->objsession->setsession('identificacion', $rslt['identificacion']);
                        $this->objsession->setsession('telefono', $rslt['telefono']);
                        $this->objsession->setsession('direccion', $rslt['direccion']);
                        $this->objsession->setsession('id_identificacion', $rslt['id_identificacion']);
                        $this->objsession->setsession('id_rol', $rslt['id_rol']);
                        header('Location:inicio');
                    } else {
                        echo ' <p class="mensaje-login">Usuario ó Contraseña Incorrecta</p>';
                    }
                } else {
                    echo ' <p class="mensaje-login">Usuario ó Contraseña Incorrecta</p>';
                }
            } else {
                echo ' <p class="mensaje-login">Usuario ó Contraseña Incorrecta</p>';
            }
        }
    }

    // Evita que el objeto se pueda clonar
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
?>