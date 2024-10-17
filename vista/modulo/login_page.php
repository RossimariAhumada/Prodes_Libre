<body class="body-login">
    <div class="login-container">
        <div class="login-box">
            <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="Logo de prodes libre" class="logo">
            <h2 class="login-title">Inicia sesión para continuar</h2>

            <!-- Asegúrate de usar el método POST -->
            <form class="login-form" method="POST">
                <label for="email" class="login-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="login-input" placeholder="Correo Electrónico"
                    required>

                <label for="password" class="login-label">Contraseña</label>
                <input type="password" id="password" name="password" class="login-input" placeholder="Contraseña"
                    required>


                <a href="#" class="forgot-password-link">¿Olvidó su contraseña?</a>
                <button type="submit" class="login-button">Iniciar Sesión</button>

                <?php
                require_once CONTROL_PATH . 'consultas_control' . DS . 'ingreso_control.php';
                $ingreso = IngresoControl::singleton_ingreso();
                $ingreso->ingresar();  // Llamada para procesar el inicio de sesión
                ?>
            </form>
            <p class="register-text">¿Aún no tienes una cuenta? <a href="<?php echo BASE_URL . 'registro_page'; ?>"
                    class="register-link">¡Regístrate ahora!</a></p>
        </div>
    </div>
</body>