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
                <img src="<?php echo PUBLIC_PATH; ?>img/lupa.png" alt="search icon" style="width: 24px;">
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
                    <a class="nav-link text-color-btn active" aria-current="page"
                        href="<?php echo BASE_URL . 'inicio'; ?>" style="color: #C60909; font-weight: bold;">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL . 'Category' . DS . 'entrada_ods'; ?>"
                        style="color: #333; font-weight: bold;">ODS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL . 'Category' . DS . 'actividades'; ?>"
                        style="color: #333; font-weight: bold;">ACTIVIDADES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #333; font-weight: bold;">AVANCES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #333; font-weight: bold;">NOTICIAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #333; font-weight: bold;">BANCOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #333; font-weight: bold;">CONTACTO</a>
                </li>
            </ul>
        </div>
    </div>
</nav>