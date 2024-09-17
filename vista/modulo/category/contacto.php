<?php
include_once VISTA_PATH . 'encabezado.php';
?>
<header class="bg-danger text-white text-center py-1">
    <h4 class="display-5 fw-bold">CONTACTO</h4>
</header>

<div class="container my-5">
    <div class="row">
        <!-- Columna de la imagen -->
        <div class="col-md-5">
            <img src="<?php echo PUBLIC_PATH; ?>img/desarrollo-sostenible.jpg" alt="Imagen" class="img-fluid">
        </div>

        <!-- Formulario en una columna -->
        <div class="col-md-7">
            <form>
                <!-- Indicador de campos obligatorios -->
                <p><strong>*</strong> señala los campos obligatorios</p>

                <!-- Nombre completo -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="custom-form-control" id="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="custom-form-control" id="apellidos" required>
                        </div>
                    </div>
                </div>

                <!-- Correo electrónico y teléfono -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="custom-form-control" id="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="custom-form-control" id="telefono" required>
                        </div>
                    </div>
                </div>

                <!-- Comentarios -->
                <div class="form-group">
                    <label for="comentarios">Comentarios *</label>
                    <textarea class="custom-form-control" id="comentarios" rows="5" maxlength="600"
                        placeholder="Por favor, haznos saber lo que tienes alguna inquietud. ¿Tienes alguna pregunta para nosotros?"
                        required></textarea>
                    <small class="form-text text-muted">0 de 600 caracteres máximos</small>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="btn btn-danger btn-block font-weight-bold">Enviar</button>
            </form>
        </div>
    </div>
</div>
<?php include_once VISTA_PATH . 'pie.php';?>