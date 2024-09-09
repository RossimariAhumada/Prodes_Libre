<?php
include_once VISTA_PATH . 'encabezado.php';
?>
<header class="bg-danger text-white text-center py-1">
    <h3 class="display-5 fw-bold">HAMBRE CERO</h3>
    <p>Objetivos y metas de desarrollo sostenible.</p>
</header>

<div class="container my-5">
    <div class="row">
        <!-- Contenido principal (imagen y texto) -->
        <div class="col-md-8">
            <img src="<?php echo PUBLIC_PATH; ?>img/hambre-cero.jpg" class="img-fluid">
            <div class="d-flex justify-content-start">
                <span>Compartir:</span>
                <a href="#" class="ms-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="ms-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="ms-3"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="ms-3"><i class="fab fa-whatsapp"></i></a>
            </div>

            <h2 class="mt-3 small-space">Hambre cero</h2>
            <p>¿Qué es Lorem Ipsum?</p>
            <p class="small-space">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor
                (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de
                tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que también
                ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue
                popularizado en los 60s con la creación de las hojas «Letraset», las cuales contenían pasajes de Lorem
                Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual
                incluye versiones de Lorem Ipsum.</p>

            <p>¿Por qué lo usamos?</p>
            <p class="small-space">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el
                contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene
                una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo
                «Contenido aquí, contenido aquí». Estos textos hacen parecerlo un español que se puede leer. Muchos
                paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al
                hacer una búsqueda de «Lorem Ipsum» va a dar por resultado muchos sitios web que usan este texto si se
                encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas
                veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).</p>

            <p>¿De dónde viene?</p>
            <p class="small-space">Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto
                aleatorio. Tiene sus raíces en una pieza clásica de la literatura del latín, que data del año 45 antes
                de Cristo, haciendo que este adquiera más de 2000 años de antigüedad. Richard McClintock, un profesor de
                latín de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la
                lengua del latín, «consecteur», en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del
                latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de «de
                Finnibus Bonorum et Malorum» (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de
                Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera
                línea del Lorem Ipsum, «Lorem ipsum dolor sit amet..», viene de una línea en la sección 1.10.32.</p>
        </div>

        <!-- Cartas ODS (alineadas verticalmente) -->
        <div class="col-md-4">
            <div class="ods-new-card ods-new-hambre mb-3">
                <a href="#"></a>
            </div>
            <div class="ods-new-card ods-new-pobreza mb-3">
                <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'fin-de-la-pobreza'; ?>"></a>
            </div>
            <div class="ods-new-card ods-new-salud mb-3">
                <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'salud-y-bienestar'; ?>"></a>
            </div>
            <div class="ods-new-card ods-new-educacion mb-3">
                <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'calidad-de-educacion'; ?>"></a>
            </div>
        </div>
    </div>

    <!-- Botones de navegación Anterior y Siguiente -->
    <div class="d-flex justify-content-between my-4">
        <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'fin-de-la-pobreza'; ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> ANTERIOR
            <br>
            <span class="small">Fin de la pobreza</span>
        </a>
        <a href="<?php echo BASE_URL . 'entrada-ods' . DS . 'salud-y-bienestar'; ?>" class="btn btn-outline-secondary">
            SIGUIENTE <i class="fas fa-arrow-right"></i>
            <br>
            <span class="small">Salud y bienestar</span>
        </a>

    </div>
</div>

<?php include_once VISTA_PATH . 'pie.php';?>

<!-- Cargar FontAwesome si no está incluido -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">