<?php
require_once CONTROL_PATH . 'consultas_control' . DS . 'ingreso_control.php';
require_once CONTROL_PATH . 'Session.php';


// Obtener los datos del usuario desde el controlador
$menuControl = IngresoControl::singleton_ingreso();
$usuario = $menuControl->mostrarMenuUsuario();
?>

<body class="body_ingreso_menu">

    <nav class="navbar">
        <div class="navbar-logo">
            <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="Logo">
            <a href="#"></a>
        </div>

        <ul class="navbar-menu">
            <li><a href="#">Inicio</a></li>

            <?php if ($usuario['id_rol'] == 1): // Administrador ?>
            <!-- Menú para administrador -->
            <li class="dropdown">
                <a href="#" class="dropbtn">Gestión</a>
                <ul class="dropdown-content">
                    <li><a href="#">Agregar Usuario</a></li>
                    <li><a href="<?php echo BASE_URL . 'gestion' . DS . 'agregar_producto'; ?>">Agregar Producto</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if ($usuario['id_rol'] == 2): // Visitante ?>
            <!-- Menú para visitante -->
            <li><a href="#">Ver Productos</a></li>
            <!--<li><a href="#">Ver Perfil</a></li>-->
            <?php endif; ?>

            <!-- Dropdown de los tres puntos -->
            <!-- <li class="dropdown">
                <a href="#" class="dropbtn">•••</a>
                <ul class="dropdown-content">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Configuración</a></li>
                    <li><a href="<?php echo BASE_URL . 'inicio' ?>">Cerrar Sesión</a></li>
                </ul>
            </li>-->

            <!-- Perfil de usuario -->
            <li class="navbar-profile">
                <span>Bienvenido, <?php echo $usuario['nombres']; ?></span>
                <img src="<?php echo PUBLIC_PATH . 'img/perfil.png'; ?>" alt="Usuario" onclick="toggleProfile()">
                <ul id="profileMenu" class="dropdown-content profile-menu">
                    <li><a href="#"><?php echo $usuario['nombres']; ?></a></li>
                    <li><a href="<?php echo BASE_URL . 'inicio' ?>">Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</body>