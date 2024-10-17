<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'entrada_ods_control.php';
require_once CONTROL_PATH . 'insercion_datos_control' . DS . 'ProductController.php';
$intContact = guardar_producto_control::singleton_producto_control();
$intContact->guardar_producto();
?>

<body class="body-product">
    <div class="product-container">
        <div class="form-header">
            <h2 class="form-title">Registro de Producto</h2>
        </div>
        <!-- Contenedor para las alertas -->
        <div id="alert-container"></div>

        <form id="product-form" class="product-form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="product-name">Nombre del Producto</label>
                    <input type="text" id="product-name" name="product-name"
                        placeholder="Ingresa el nombre del producto" required>
                </div>

                <div class="form-group">
                    <label for="product-value">Valor del Producto</label>
                    <input type="number" id="product-value" name="product-value" placeholder="Ingresa el valor"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="product-description">Descripción del Producto</label>
                    <textarea id="product-description" name="product-description" maxlength="100"
                        placeholder="Ingresa una descripción del producto" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="product-image">Foto del Producto</label>
                    <div class="custom-file-container">
                        <input type="file" id="product-image" name="product-image" accept=".jpg, .jpeg, .png" required>
                        <label for="product-image" class="custom-file-upload">Seleccionar archivo</label>
                        <span id="file-name" class="file-upload-info">Ningún archivo seleccionado</span>
                    </div>
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
            <input type="submit" id="submit-product" class="btn" value="Registrar Producto">
        </form>
    </div>

    <script>
    // Obtener elementos
    const fileInput = document.getElementById('product-image');
    const fileNameDisplay = document.getElementById('file-name');
    const alertContainer = document.getElementById('alert-container');

    // Mostrar el nombre del archivo seleccionado y validar si es JPG o PNG
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const fileName = file ? file.name : 'Ningún archivo seleccionado';

        // Mostrar el nombre del archivo
        fileNameDisplay.textContent = fileName;

        // Validar extensión del archivo (solo .jpg, .jpeg, .png)
        const validExtensions = ['jpg', 'jpeg', 'png'];
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
    </script>
</body>