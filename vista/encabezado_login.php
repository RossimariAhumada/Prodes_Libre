<?php
require_once CONTROL_PATH . 'consultas_control' . DS . 'ingreso_control.php';
require_once CONTROL_PATH . 'Session.php';

// Obtener los datos del usuario desde el controlador
$menuControl = IngresoControl::singleton_ingreso();
$usuario = $menuControl->mostrarMenuUsuario();
?>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar-container navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-logo d-flex align-items-center" href="#">
                <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="logo" class="logo-image">
            </a>

            <!-- Enlaces de navegación -->
            <div class="collapse navbar-collapse justify-content-center mx-5" id="navbarNav">
<!--------------------------------------------------------------------MENU ADMINISTRADOR------------------------------------------------------------->
                <?php if ($usuario['id_rol'] == 1): // Administrador ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'banco_proyecto_gestion' || $_SERVER['REQUEST_URI'] == '/Prodes_Libre/') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'gestion' . DS . 'banco_proyecto_gestion'; ?>">BANCO
                            PROYECTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'agregar_producto') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'gestion' . DS . 'agregar_producto'; ?>">PRODUCTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'agregar_actividad') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'gestion' . DS . 'agregar_actividad'; ?>">ACTIVIDADES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'avances') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'Category' . DS . 'avances'; ?>">AVANCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'noticias') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'Category' . DS . 'noticias'; ?>">NOTICIAS</a>
                    </li>
                </ul>
                <?php endif; ?>
<!--------------------------------------------------------------------MENU VISITANTE------------------------------------------------------------->
                <?php if ($usuario['id_rol'] == 2): // Visitante ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'banco_proyecto' || $_SERVER['REQUEST_URI'] == '/Prodes_Libre/') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'gestion' . DS . 'banco_proyecto'; ?>">BANCO PROYECTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'producto_login') ? 'active' : ''; ?>"
                            href="<?php echo BASE_URL . 'tienda' . DS . 'producto_login'; ?>">TIENDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'avances') ? 'active' : ''; ?>"
                            href="#">AVANCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'noticias') ? 'active' : ''; ?>"
                            href="#">NOTICIAS</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>

            <!-- Iconos de usuario y carrito -->
            <div class="user-icons d-flex align-items-center m-2" id="icon-container">
                <a href="#">
                    <img src="<?php echo PUBLIC_PATH; ?>img/bolsa.png" alt="Carrito" class="cart-icon me-3">
                </a>
                <img src="<?php echo PUBLIC_PATH . 'img/perfil.png'; ?>" alt="Usuario" class="user-icon"
                    onclick="toggleProfile()">

                <!-- Menú desplegable de perfil -->
                <ul id="profileMenu" class="dropdown-content profile-menu">
                    <li><a href="#"><?php echo $usuario['nombres']; ?></a></li>
                    <!-- Enlace para cerrar sesión -->
                    <li><a href="<?php echo BASE_URL . DS . 'inicio'; ?>">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Scripts -->
    <script>
    // Función para mostrar/ocultar el menú de perfil
    function toggleProfile() {
        var profileMenu = document.getElementById("profileMenu");
        profileMenu.classList.toggle("show");
    }
    </script>
</body>

</html>