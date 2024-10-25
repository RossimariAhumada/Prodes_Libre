<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'entrada_ods_control.php';
require_once CONTROL_PATH . 'insercion_datos_control' . DS . 'Banco_proyecto_control.php';
$intContact = guardar_proyecto_control::singleton_proyecto_control();
$intContact->guardar_proyecto();
?>

<body>
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Banco de Proyectos</h3>
    </header>

    <div class="project-container mt-5">
        <!-- Contenedor para alertas -->
        <div id="alert-container"></div>

        <form class="project-form" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombreProyecto" class="form-label-custom">Nombre del Proyecto</label>
                <input type="text" class="form-control-custom" id="nombreProyecto" name="nombreProyecto" placeholder="Ingrese el nombre del proyecto" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ods" class="form-label-custom">ODS Relacionados</label>
                    <select class="form-select-custom" id="ods" name="ods" required>
                        <option value="" selected>Seleccionar ODS</option>
                        <?php
                        $ods_election = entrada_ods_control::tipo_entrada_ods();
                        foreach ($ods_election as $j) {
                            echo '<option value="' . $j['id_ods'] . '">' . $j['nombre_ods'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="presupuesto" class="form-label-custom">Presupuesto Estimado</label>
                    <input type="number" class="form-control-custom" id="presupuesto" name="presupuesto" placeholder="Ingrese el presupuesto estimado" required>
                </div>
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
            <div class="mb-3">
                <label for="equipo" class="form-label-custom">Equipo o Responsables</label>
                <input type="text" class="form-control-custom" id="equipo" name="equipo" placeholder="Ingrese el equipo responsable" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label-custom">Ubicación o Alcance Geográfico</label>
                <input type="text" class="form-control-custom" id="ubicacion" name="ubicacion" placeholder="Ej: Ciudad, Región, País o Global" required>
            </div>
            <div class="mb-3">
                <label for="indicadores" class="form-label-custom">Indicadores de Éxito o Resultados Esperados</label>
                <textarea class="form-control-custom" id="indicadores" name="indicadores" rows="3" placeholder="Ingrese los indicadores de éxito o resultados esperados" required></textarea>
            </div>
            <div class="mb-3">
                <label for="product-image" class="form-label-custom">Adjuntar Proyecto (PDF)</label>
                <div class="custom-file-container">
                    <input type="file" id="product-image" name="documento_adjunto" accept=".pdf" required>
                    <label for="product-image" class="custom-file-upload">Seleccionar archivo</label>
                    <span id="file-name" class="file-upload-info">Ningún archivo seleccionado</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label-custom">Descripción del Proyecto</label>
                <textarea class="form-control-custom" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese una descripción del proyecto" required></textarea>
            </div>
            <button type="submit" class="btn-custom w-100">Guardar Proyecto</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>

    <?php include_once VISTA_PATH . 'pie.php';?>

    <script>
    // Abrir el calendario al hacer clic en cualquier parte del input[type="date"]
    document.querySelectorAll('input[type="date"]').forEach(function(input) {
        input.addEventListener('click', function() {
            this.showPicker(); // Método que abre el calendario
        });
    });

    // Obtener elementos para mostrar el nombre del archivo seleccionado y validar si es PDF
    const fileInput = document.getElementById('product-image');
    const fileNameDisplay = document.getElementById('file-name');
    const alertContainer = document.getElementById('alert-container');

    // Mostrar el nombre del archivo seleccionado y validar si es PDF
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const fileName = file ? file.name : 'Ningún archivo seleccionado';

        // Mostrar el nombre del archivo
        fileNameDisplay.textContent = fileName;

        // Validar extensión del archivo (solo .pdf)
        const validExtensions = ['pdf'];
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (file && !validExtensions.includes(fileExtension)) {
            // Mostrar alerta si no es un archivo PDF
            alertContainer.innerHTML = '<p style="color: red;">Solo se permiten archivos PDF.</p>';
            this.value = ''; // Limpiar el input
            fileNameDisplay.textContent = 'Ningún archivo seleccionado'; // Reiniciar el nombre mostrado
        } else {
            // Limpiar alertas si el archivo es válido
            alertContainer.innerHTML = '';
        }
    });
    </script>
</body>
