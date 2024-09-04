<!-- Primera barra de navegación con el logo, barra de búsqueda, y iconos de usuario y carrito -->
<nav class="navbar navbar-light bg-white py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="logo" style="width: 250px;">
        </a>
        <!-- Barra de búsqueda -->
        <form class="d-flex flex-grow-1 justify-content-center mx-5" id="search-form">
            <input class="form-control form-control-lg me-0" type="search" placeholder="Buscar.." aria-label="Search"
                id="search-input">
            <button class="btn btn-color-btn" type="submit" id="search-button">
                <img src="<?php echo PUBLIC_PATH; ?>img/lupa.png" alt="search icon">
            </button>
            <!-- Iconos de carrito y usuario -->
            <div class="d-flex align-items-center m-2" id="icon-container">
                <img src="<?php echo PUBLIC_PATH; ?>img/bolsa.png" alt="Carrito" class="me-3" style="width: 30px;">
                <img src="<?php echo PUBLIC_PATH; ?>img/usuario.png" alt="Login" style="width: 30px;">
            </div>
    </div>
    </form>
</nav>

<!-- Segunda barra de navegación con los enlaces -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid justify-content-center">
        <!-- Botón para menú colapsable en dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Enlaces de navegación -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'inicio') ? 'active' : ''; ?>"
                        href="<?php echo BASE_URL . 'inicio'; ?>">INICIO</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'inicio' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'entrada_ods') ? 'active' : ''; ?>"
                        href="<?php echo BASE_URL . 'Category' . DS . 'entrada_ods'; ?>">ODS</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'entrada_ods' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'actividades') ? 'active' : ''; ?>"
                        href="<?php echo BASE_URL . 'Category' . DS . 'actividades'; ?>">ACTIVIDADES</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'avances' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'avances') ? 'active' : ''; ?>"
                        href="#">AVANCES</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'noticias' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'noticias') ? 'active' : ''; ?>"
                        href="#">NOTICIAS</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'bancos' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'bancos') ? 'active' : ''; ?>"
                        href="#">BANCOS</a>
                </li>
                <li class="nav-item">
                    <!-- Verifica si la página actual es 'contacto' y añade la clase 'active' si es así -->
                    <a class="nav-link nav-hover <?php echo (basename($_SERVER['REQUEST_URI']) == 'contacto') ? 'active' : ''; ?>"
                        href="#">CONTACTO</a>
                </li>
            </ul>
        </div>
    </div>
</nav>