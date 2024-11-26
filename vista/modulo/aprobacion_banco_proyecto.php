<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

// Validar si se proporcionó un ID de proyecto
if (!isset($_GET['id'])) {
    die('ID de proyecto no especificado.');
}

$id_proyecto = $_GET['id'];
$proyectoController = BancoProyectoController::singleton_conexion();
$proyecto = $proyectoController->obtenerProyectoPorId($id_proyecto);

if (!$proyecto) {
    die('Proyecto no encontrado.');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Proyecto</title>
    <!-- Bootstrap CSS -->
</head>

<body>
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Detalle Proyecto</h3>
    </header>
    <div class="container mt-5">

        <!-- Detalles del proyecto -->
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <td><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></td>
            </tr>
            <tr>
                <th>ODS</th>
                <td><?php echo htmlspecialchars($proyecto['nombre_ods']); ?></td>
            </tr>
            <tr>
                <th>Fecha de Inicio</th>
                <td>
                    <?php echo date('d-m-Y', strtotime($proyecto['fecha_inicio'])); ?>
                </td>
            </tr>
            <tr>
                <th>Fecha Final</th>
                <td>
                    <?php echo date('d-m-Y', strtotime($proyecto['fecha_final'])); ?>
                </td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td><?php echo nl2br(htmlspecialchars($proyecto['descripcion_proyecto'])); ?></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo htmlspecialchars($proyecto['descripcion_estado']); ?></td>
            </tr>
        </table>

        <!-- Formulario para actualizar el estado del proyecto -->
        <form action="vista/modulo/tienda/procesar_actualizacion.php" method="POST" class="mt-4 text-center-buttons">
            <input type="hidden" name="id_proyecto" value="<?php echo htmlspecialchars($proyecto['id_proyecto']); ?>">
            <div class="mb-3">
                <label for="nuevo_estado" class="form-label">Actualizar Estado</label>
                <select name="nuevo_estado" id="nuevo_estado" class="form-select">
                    <option value="1" <?php echo $proyecto['id_estado'] == 1 ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="2" <?php echo $proyecto['id_estado'] == 2 ? 'selected' : ''; ?>>Aprobado</option>
                    <option value="3" <?php echo $proyecto['id_estado'] == 3 ? 'selected' : ''; ?>>Rechazado</option>
                </select>
            </div>
            <button type="submit" class="btn-success1">Actualizar</button>
        </form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<?php include_once VISTA_PATH . 'pie.php';?>

</html>