<?php
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

// Parámetros de paginación
$paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$limite = 5;

$proyectoController = BancoProyectoController::singleton_conexion();
$resultado = $proyectoController->obtenerProyectosPaginados1($paginaActual, $limite);

$proyectos = $resultado['proyectos'];
$totalProyectos = $resultado['total'];
$totalPaginas = ceil($totalProyectos / $limite);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Proyectos</title>
    <!-- Bootstrap CSS -->
</head>

<body>
    <header class="bg-danger text-white text-center py-3">
        <h3 class="header-title">Banco de Proyectos</h3>
    </header>

    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre Proyecto</th>
                    <th>ODS</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proyectos)): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                <tr>
                    <td><?php echo $proyecto['nombre_proyecto']; ?></td>
                    <td><?php echo $proyecto['nombre_ods']; ?></td>
                    <td><?php echo $proyecto['fecha_inicio']; ?></td>
                    <td><?php echo $proyecto['fecha_final']; ?></td>
                    <td><?php echo $proyecto['descripcion_proyecto']; ?></td>
                    <td><?php echo $proyecto['descripcion_estado']; ?></td>
                    <td>
                        <?php if ($proyecto['id_estado'] == 2): ?>
                        <button class="btn btn-custom btn-sm" disabled>Estado</button>
                        <?php else: ?>
                        <a href="<?php echo BASE_URL . 'aprobacion_banco_proyecto'; ?>?id=<?php echo $proyecto['id_proyecto']; ?>"
                            class="btn btn-custom btn-sm">
                            Estado
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No hay proyectos disponibles</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Navegación de paginación -->
        <nav aria-label="Paginación">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?php echo $i == $paginaActual ? 'active' : ''; ?>">
                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <?php include_once VISTA_PATH . 'pie.php'; ?>
</body>

</html>