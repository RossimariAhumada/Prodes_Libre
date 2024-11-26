<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'Session.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'ingreso_control.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'producto_control.php';
require_once CONTROL_PATH . 'insercion_datos_control' . DS . 'guardar_compra_control.php';


// Llamar al controlador para guardar la compra
$guardarCompraControl = GuardarCompraControl::singleton_compra_control();
$guardarCompraControl->guardar_compra();

// Obtener los datos del usuario desde el controlador
$menuControl = IngresoControl::singleton_ingreso();
$usuario = $menuControl->mostrarMenuUsuario();

// Obtener el id_prdcto de la URL (o de cualquier parámetro GET)
$id_prdcto = isset($_GET['id_prdcto']) ? (int) $_GET['id_prdcto'] : 0; // Validamos que sea un entero

// Verificamos si se recibió un id válido
if ($id_prdcto > 0) {
    // Obtener los datos del producto desde el controlador
    $ProduControl = ProductoController::singleton_conexion();
    $producto1 = $ProduControl->mostrarProducto($id_prdcto); // Pasamos el id del producto al método

    // Verificamos si los datos del producto fueron encontrados
    if ($producto1) {
        $producto = htmlspecialchars($producto1['nombre_prdcto']);
        $valor = number_format($producto1['valor_prdcto'], 2);
        $id_ods = $producto1['id_ods'];  // Obtener el id_ods
        $id_producto = $producto1['id_prdcto'];  // Obtener el id_producto
    } else {
        $producto = 'Producto no encontrado';
        $valor = '0.00';
        $id_ods = 'No disponible'; // Si no se encuentra el producto
        $id_producto = 'No disponible';
    }
} else {
    $producto = 'Producto no especificado';
    $valor = '0.00';
    $id_ods = 'No disponible';
    $id_producto = 'No disponible';
}
?>

<body class="body-product">
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Confirmar compra</h3>
    </header>
    <div class="product-container">
        <!-- Contenedor para las alertas -->
        <div id="alert-container"></div>
        <br></br>
        <form id="domicilio-form" class="product-form" method="POST">
            <div class="form-row">
                <!-- Campos de Producto y Valor dentro del formulario -->
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="producto">Producto</label>
                        <input type="text" id="producto" name="producto" value="<?= $producto ?>" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" value="<?= number_format($producto1['valor_prdcto'], 2, '.', ',') ?>" readonly>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="nombre">Nombre y apellido</label>
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombres']; ?>"
                            placeholder="Ingresa tu nombre y apellido" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="documento">Documento</label>
                        <input type="text" id="documento" name="documento"
                            value="<?php echo $usuario['identificacion']; ?>" placeholder="Documento" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="tipo_calle">Dirección</label>
                        <input type="text" id="tipo_calle" value="<?php echo $usuario['direccion']; ?>"
                            name="tipo_calle" placeholder="Ejemplo: Av., Calle" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="numero">Número</label>
                        <input type="text" id="numero" value="<?php echo $usuario['telefono']; ?>" name="numero"
                            placeholder="Número" readonly>
                    </div>
                </div>

                <!-- Mostrar el id_producto y id_ods en el formulario -->
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="hidden" id="id_producto" name="id_producto" value="<?= $id_producto ?>" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <input type="hidden" id="id_ods" name="id_ods" value="<?= $id_ods ?>" readonly>
                    </div>
                </div>

            </div>
            <!-- Cambio del tamaño del botón y nombre de la clase -->
            <input type="submit" id="submit-domicilio" class="btn-custom" value="Confirmar compra">
        </form>
    </div>
    <?php include_once VISTA_PATH . 'pie.php';?>
</body>