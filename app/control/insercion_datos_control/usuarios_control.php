<?php
require_once MODELO_PATH . 'insercion_datos_model' . DS . 'usuarios_model.php';
require CONTROL_PATH . 'Incriptacion.php';

class guardar_usuario_control {
    private static $instancia;

    public static function singleton_guardar_usuario() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function guardar_usuario_control() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'identificacion' => $_POST['id-number'] ?? '',
                'nombres' => $_POST['fullname'] ?? '',
                'correo' => $_POST['email'] ?? '',
                'password' => $_POST['confirm-password'] ?? '',
                'telefono' => $_POST['phone'] ?? '',
                'direccion' => $_POST['address'] ?? '',
                'id_identificacion' => $_POST['tipo_identificacion'] ?? ''
            ];

            // Verificar si las contraseñas coinciden
            if ($_POST['password'] !== $_POST['confirm-password']) {
                $this->mostrar_mensaje(['rsl' => FALSE, 'mensaje' => 'Las contraseñas no coinciden.']);
                return;
            }

            // Validar que la contraseña cumpla los requisitos
            if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{1,8}$/', $_POST['password'])) {
                $this->mostrar_mensaje(['rsl' => FALSE, 'mensaje' => 'La contraseña debe tener la primera letra en mayúscula, al menos un número y no más de 8 caracteres.']);
                return;
            }

            if ($this->validar_datos($data)) {
                $modelo = new guardar_usuario_model();
                $resultado_validacion = $modelo->validarUsuarioModel($data['correo']); // Llama al método correcto

                if ($resultado_validacion['status'] === 0) {
                    // Usuario ya existe
                    $this->mostrar_mensaje(['rsl' => FALSE, 'mensaje' => 'Usuario registrado correctamente']);
                } else {
                    // Usuario nuevo, proceder a guardar
                    $claveencriptada = Hash::hashpass($data['password']);
                    $valores = array_merge($data, ['password' => $claveencriptada, 'id_rol' => 2]);

                    $resultado = $modelo->guardar_usuario_model($valores);

                    // Verifica si se guardó correctamente
                    if ($resultado['rsl'] === TRUE) {
                        $this->mostrar_mensaje(['rsl' => FALSE, 'mensaje' => 'Error al guardar registro.']);
                    } else {
                        // Si se guardó correctamente
                        $this->mostrar_mensaje(['rsl' => TRUE, 'mensaje' => 'Usuario registrado correctamente.']);
                    }
                }
            } else {
                // Mensaje de validación fallida
                $this->mostrar_mensaje(['rsl' => FALSE, 'mensaje' => 'Datos de entrada no válidos.']);
            }
        }
    }

    private function validar_datos($data) {
        return !empty($data['identificacion']) &&
               !empty($data['nombres']) &&
               !empty($data['correo']) &&
               filter_var($data['correo'], FILTER_VALIDATE_EMAIL) &&
               !empty($data['password']) &&
               !empty($data['telefono']) &&
               !empty($data['direccion']) &&
               !empty($data['id_identificacion']);
    }

    private function mostrar_mensaje($resultado) {
        echo '<div id="solapar"></div>';
        echo '<div id="popupmensaje">';
        echo '    <a href="" id="btcerrar">Cerrar/Close</a>';
        
        if ($resultado['rsl'] === FALSE) {
            // Mostrar mensaje de error
            echo '    <div class="cuerpopopup">';
            echo '        <img src="' . PUBLIC_PATH . 'img/bien.png" />';
            echo '        <p>' . ($resultado['mensaje'] ?? 'Error al intentar guardar') . '</p>';
            echo '        <div id="centaropcion">';
            echo '            <a href="" class="opcion" id="btaceptar">ACEPTAR</a>';
            echo '        </div>';
            echo '    </div>';
        } else if ($resultado['rsl'] === TRUE) {
            // Mostrar mensaje de éxito
            echo '    <div class="popupbarratitilo"><h2>Éxito</h2></div>';
            echo '    <div class="cuerpopopup">';
            echo '        <img src="' . PUBLIC_PATH . 'img/error.png" />';
            echo '        <p>' . ($resultado['mensaje'] ?? 'Usuario registrado correctamente') . '</p>';
            echo '        <div id="centaropcion">';
            echo '            <a href="" class="opcion" id="btaceptar">ACEPTAR</a>';
            echo '        </div>';
            echo '    </div>';
        }
        echo '</div>';
    }
}
?>