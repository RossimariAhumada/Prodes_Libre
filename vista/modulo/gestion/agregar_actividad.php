<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'entrada_ods_control.php';
require_once CONTROL_PATH . 'insercion_datos_control' . DS . 'Actividad_control.php';
$intContact = guardar_actividad_control::singleton_actividad_control();
$intContact->guardar_actividad();
?>

<body class="body-product">
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Actividad</h3>
    </header>
    <div class="product-container">
        <!-- Contenedor para las alertas -->
        <div id="alert-container"></div>

        <form id="product-form" class="product-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="product-name">Nombre de la Actividad</label>
                    <input type="text" id="actividad-name" name="actividad-name"
                        placeholder="Ingresa el nombre de la actividad" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fechaInicio" class="form-label-custom">Fecha de Inicio</label>
                        <input type="date" class="form-control-custom" id="fechaInicio" name="fechaInicio" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fechaFin" class="form-label-custom">Fecha de Finalización</label>
                        <input type="date" class="form-control-custom" id="fechaFin" name="fechaFin" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product-value">Participantes</label>
                    <input type="number" id="participante-value" name="participante-value"
                        placeholder="Ingrese la cantidad de participantes" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="product-description">Descripción de la Activiad</label>
                    <textarea id="actividad-description" name="actividad-description" maxlength="100"
                        placeholder="Ingresa una descripción de la actividad" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="product-description">Detalle de la Activiad</label>
                    <textarea id="actividad-description_detelle" name="actividad-description_detalle" maxlength="100"
                        placeholder="Ingresar detalle de la actividad" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="ods-selection">Seleccionar ODS</label>
                    <select id="ods-selection" name="ods_selection" required>
                        <option value="">Selecciona un ODS..</option>
                        <!-- Opciones adicionales -->
                        <?php
                        $ods_election = entrada_ods_control::tipo_entrada_ods();
                        foreach ($ods_election as $j) {
                            echo '<option value="' . $j['id_ods'] . '">' . $j['nombre_ods'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="actividad-image">Foto de la Actividad</label>
                    <div class="custom-file-container">
                        <input type="file" id="actividad-image" name="actividad-image" accept=".jfif,.jpg,.jpeg,.png"
                            required>
                        <label for="actividad-image" class="custom-file-upload">Seleccionar archivo</label>
                        <span id="file-name" class="file-upload-info">Ningún archivo seleccionado</span>
                    </div>
                </div>
            </div>
            <input type="submit" id="submit-product" class="btn" value="Registrar Actividad">
        </form>
    </div>
    <?php include_once VISTA_PATH . 'pie.php';?>
    <script>
    // Obtener elementos
    const fileInput = document.getElementById('actividad-image');
    const fileNameDisplay = document.getElementById('file-name');
    const alertContainer = document.getElementById('alert-container');

    // Mostrar el nombre del archivo seleccionado y validar si es JPG o PNG
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const fileName = file ? file.name : 'Ningún archivo seleccionado';

        // Mostrar el nombre del archivo
        fileNameDisplay.textContent = fileName;

        // Validar extensión del archivo (solo .pdf
        const validExtensions = ['jpg', 'jpeg', 'png', 'jfif'];
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (file && !validExtensions.includes(fileExtension)) {
            // Mostrar alerta si no es un archivo JPG o PNG
            alertContainer.innerHTML = '<p style="color: red;">Solo se permiten archivos JPG o PNG.</p>';
            this.value = ''; // Limpiar el input
            fileNameDisplay.textContent = 'Ningún archivo seleccionado'; // Reiniciar el nombre mostrado
        } else {
            // Limpiar alertas si el archivo es válido
            alertContainer.innerHTML = '';
        }
    });

    // Abrir el calendario al hacer clic en cualquier parte del input[type="date"]
    document.querySelectorAll('input[type="date"]').forEach(function(input) {
        input.addEventListener('click', function() {
            this.showPicker(); // Método que abre el calendario
        });
    });
    </script>
</body>