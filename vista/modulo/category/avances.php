<?php
include_once VISTA_PATH . 'encabezado.php';
?>
<header class="bg-danger text-white text-center py-1">
    <h3 class="display-5 fw-bold">AVANCES</h3>
    <p>Objetivos y metas de desarrollo sostenible.</p>
</header>

<!-- Bootstrap container -->
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Columna de la imagen -->
        <div class="col-md-4">
            <img src="<?php echo PUBLIC_PATH; ?>img/avance.png" alt="Avances" class="img-fluid">
        </div>
        <!-- Columna del texto -->
        <div class="col-md-8">
            <h3 class="text-color-btn font-weight-bold">Avances</h3>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido
                el texto de relleno estándar de</p>
            <a href="#" class="text-color-btn font-weight-bold">Ver más &rsaquo;</a>
        </div>
    </div>
</div>
<?php include_once VISTA_PATH . 'pie.php';?>