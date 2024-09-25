<?php
require_once CONTROL_PATH . 'consultas_control' . DS . 'tipo_identificacion_Control.php';
require_once CONTROL_PATH . 'insercion_datos_control' . DS . 'usuarios_control.php';

$intUsuario = guardar_usuario_control::singleton_guardar_usuario();
// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $intUsuario->guardar_usuario_control();
}
?>

<body class="body-registro">
    <div class="registro-container">
        <div class="form-header">
            <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="Logo Prodes libre">
            <h2 class="login-title">Registro de Usuario</h2>
        </div>

        <!-- Contenedor para las alertas -->
        <div id="alert-container"></div>

        <form id="formu" class="registration-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar Contraseña" required>
                </div>

                <div class="form-group">
                    <label for="fullname">Nombre completo</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Nombre completo">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="id-type">Tipo de Identificación</label>
                    <select id="tipo_identificacion" name="tipo_identificacion">
                        <option value="">Tipo de Identificación</option>
                        <!-- Opciones adicionales -->
                        <?php
                        $tipo_identificacion = tipo_identificacionControl::tipos_identificacionControl();
                        foreach ($tipo_identificacion as $j) {
                            echo '<option value="' . $j['id_identificacion'] . '">' . $j['descripcion'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id-number">Identificación</label>
                    <input type="text" id="id-number" name="id-number" placeholder="Identificación">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" id="phone" name="phone" placeholder="Teléfono">
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" name="address" placeholder="Dirección">
                </div>
            </div>

            <input type="submit" id="submit-btn" class="btn" value="Registrar">
            <p class="login-text">
                ¿Ya tienes una cuenta? <a href="<?php echo BASE_URL . 'login_page'; ?>">Inicia sesión aquí</a>
            </p>
        </form>
    </div>
</body>
