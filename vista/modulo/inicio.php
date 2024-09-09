<?php
include_once VISTA_PATH . 'encabezado.php';
?>

<body>
    <div id="sostenibilidadCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo PUBLIC_PATH; ?>img/2.jpg" alt="Banner de Sostenibilidad" class="d-block w-100">
                <div class="carousel-caption d-flex flex-column align-items-center">
                    <h1 class="text-center">La sostenibilidad no es una opción, es una responsabilidad</h1>
                    <p class="text-center">Pequeñas acciones hoy, grandes cambios mañana.</p>
                    <a href="#" class="btn btn-custom">Ver más</a>
                </div>
            </div>
        </div>
    </div>

    <section class="container py-5">
        <div class="row align-items-center">
            <!-- Columna para la imagen -->
            <div class="col-md-6 order-md-1 order-2">
                <img src="<?php echo PUBLIC_PATH; ?>img/desarrollo-sostenible.jpg" alt="Imagen sobre Prodes Unilibre"
                    class="img-fluid custom-shape-image">
            </div>
            <!-- Columna para el texto -->
            <div class="col-md-6 order-md-2 order-1">
                <img src="<?php echo PUBLIC_PATH; ?>img/universidad_Libre.png" alt="Logo Universidad Libre"
                    class="img-fluid mb-3" style="max-width: 100px;">
                <h2 class="text-color-btn">SOBRE PRODES UNILIBRE</h2>
                <h4>Al fundar Prodes Unilibre:</h4>
                <p>Cuando se creó Prodes Unilibre, el objetivo principal era introducir una plataforma innovadora y
                    pionera en una institución de educación superior colombiana, en este caso, la Universidad Libre.</p>
                <p>Esta plataforma tenía la intención de servir como un medio eficaz para la difusión de información
                    valiosa relacionada con los Objetivos de Desarrollo Sostenible (ODS).</p>
                <a href="#" class="btn btn-color-btn">Ver más</a>
            </div>
        </div>
    </section>

    <div class="banner position-relative">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div> <!-- Capa de fondo semitransparente -->
        <div
            class="content position-relative d-flex flex-column justify-content-center align-items-center text-center h-100">
            <h2 class="font-weight-bold text-white">El camino hacia un futuro en equilibrio con nuestro planeta.</h2>
            <p class="lead text-white">Juntos, construimos un mundo donde las necesidades del presente no comprometen
                las del mañana.</p>
        </div>
    </div>

    <div class="container text-center my-5">
        <h2 class="text-color-btn fw-bold">ODS DESTACADOS</h2>
        <p>¡Prodes Libre: proyectos sostenibles, impacto global! Únete ahora y crea un futuro mejor.</p>
        <div class="row">
        <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="ods-card ods-educacion">
                    <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'calidad-de-educacion'; ?>">
                        <div class="display-4"></div>
                        <div></div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="ods-card ods-hambre">
                    <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'hambre-cero'; ?>">
                        <div class="display-4"></div>
                        <div></div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="ods-card ods-pobreza">
                    <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'fin-de-la-pobreza'; ?>">
                        <div class="display-4"></div>
                        <div></div>
                    </a>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="ods-card ods-salud">
                    <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'salud-y-bienestar'; ?>">
                        <div class="display-4"></div>
                        <div></div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    </div>
    <?php include_once VISTA_PATH . 'pie.php';?>
</body>