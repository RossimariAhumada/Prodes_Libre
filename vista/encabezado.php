<header>
    <!-- Primera barra de navegación con el logo, barra de búsqueda, y iconos de usuario y carrito -->
    <nav class="navbar navbar-light bg-white py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="<?php echo PUBLIC_PATH; ?>img/Logo-PodresLibre.png" alt="logo">
            </a>
            <!-- Barra de búsqueda -->
            <form class="d-flex flex-grow-1 justify-content-center mx-5">
                <input class="form-control form-control-lg me-0" type="search" placeholder="Buscar.." aria-label="Search" style="width: 60%;">
                <button class="btn btn-color-btn" type="submit">
                    <img src="<?php echo PUBLIC_PATH; ?>img/lupa.png" alt="search icon" style="width: 24px;">
                </button>
                <!-- Iconos de carrito y usuario -->
                <div class="d-flex align-items-center m-2">
                    <img src="<?php echo PUBLIC_PATH; ?>img/bolsa.png" alt="Carrito" class="me-3" style="width: 24px;">
                    <img src="<?php echo PUBLIC_PATH; ?>img/usuario.png" alt="Login" style="width: 24px;">
                </div>
        </div>
        </form>
    </nav>

    <!-- Segunda barra de navegación con los enlaces -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="margin-top: -20px;height: 25px;">
        <div class="container-fluid justify-content-center">
            <!-- Botón para menú colapsable en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Enlaces de navegación -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-color-btn active" aria-current="page" href="#">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ODS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ACTIVIDADES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AVANCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NOTICIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACTO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>