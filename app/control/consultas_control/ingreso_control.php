<?php
require_once MODELO_PATH . 'consultas_model' . DS . 'ingreso_model.php';
require_once CONTROL_PATH . 'Session.php';

class IngresoControl {

    private static $instancia;
    private $objsession;

    // Singleton para asegurar que solo haya una instancia
    public static function singleton_ingreso() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function ingresar() {
        if (
            isset($_POST['email']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
            isset($_POST['password']) && !empty($_POST['password'])
        ) {
            $correo = $_POST['email'];
            $password = $_POST['password'];
            
            // Verificamos el usuario
            $rslt = IngresoModel::verificar_user($correo);
            if ($rslt) {
                if ($rslt['correo'] === $correo) {
                    $hash = $rslt['password'];
    
                    // Verificamos la contraseña
                    if (IngresoModel::check_password($hash, $password)) {
                        // Iniciamos la sesión y guardamos los datos del usuario
                        $this->objsession = new Session;
                        $this->objsession->iniciar();
    
                        $this->objsession->setsession('id_usuario', $rslt['id_usuario']);
                        $this->objsession->setsession('correo', $rslt['correo']);
                        $this->objsession->setsession('nombres', $rslt['nombres']);
                        $this->objsession->setsession('identificacion', $rslt['identificacion']);
                        $this->objsession->setsession('telefono', $rslt['telefono']);
                        $this->objsession->setsession('direccion', $rslt['direccion']);
                        $this->objsession->setsession('id_rol', $rslt['id_rol']);
    
                        // Redirigir al inicio
                        header('Location:ingreso_inicio');
                    } else {
                        // Contraseña incorrecta
                        echo '<div id="error-alert" class="alert alert-danger" role="alert">Usuario o Contraseña Incorrecta</div>';
                    }
                } else {
                    // Usuario incorrecto
                    echo '<div id="error-alert" class="alert alert-danger" role="alert">Usuario o Contraseña Incorrecta</div>';
                }
            } else {
                // Usuario no encontrado
                echo '<div id="error-alert" class="alert alert-danger" role="alert">Usuario o Contraseña Incorrecta</div>';
            }
        } else {
            //echo '<div id="error-alert" class="alert alert-warning" role="alert">Debe completar todos los campos</div>';
        }
    }
    

    // Método para obtener la información del usuario logueado para el menú
    public function mostrarMenuUsuario() {
        $this->objsession = new Session;
        $this->objsession->iniciar();
    
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            
            $datosUsuario = IngresoModel::obtenerDatosUsuario($id_usuario);
            if ($datosUsuario) {
                return $datosUsuario; // Devuelve también el rol
            }
        } else {
            header('Location: ' . BASE_URL . 'inicio');
            exit();
        }
    }

    // Evitar la clonación
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    
}
