<?php
session_start();
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

$proyectoController = BancoProyectoController::singleton_conexion();
$proyectos = $proyectoController->obtenerTodosLosProyectos(); // Obtenemos todos los proyectos
?>

<!DOCTYPE html>
<html lang="es">

<body>
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Banco de Proyectos</h3>
    </header>

        <!-- Tabla de proyectos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre Proyecto</th>
                    <th>ODS</th>
                    <th>Fecha de Inicio</th>
                    <th>Estado</th>
                    <th>Aprobación</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($proyectos): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                <tr>
                    <td><?php echo $proyecto['nombre_proyecto']; ?></td>
                    <td><?php echo $proyecto['nombre_ods']; ?></td>
                    <td><?php echo $proyecto['fecha_inicio']; ?></td>
                    <td><?php echo $proyecto['descripcion_estado']; ?></td>
                    <td>
                        <?php if ($proyecto['id_estado'] == 2): ?>
                            <!-- Ícono de aprobado (sin enlace) -->
                            <i class="fas fa-check-circle text-success"></i> <!-- Proyecto aprobado, sin enlace -->
                        <?php else: ?>
                            <!-- Ícono de no aprobado con enlace -->
                            <a href="<?php echo BASE_URL . 'gestion' . DS . 'aprobacion_banco_proyecto?id=' . $proyecto['id_proyecto']; ?>" class="text-decoration-none">
                                <i class="fas fa-times-circle text-danger"></i> <!-- Proyecto no aprobado, con enlace -->
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5">No hay proyectos disponibles</td> <!-- Mensaje cuando no hay proyectos -->
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
</body>
<!-- Pie de página -->
<?php include_once VISTA_PATH . 'pie.php';?>
</html>
