<?php
session_start();
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

$id_usuario = $_SESSION['id_usuario']; 
$proyectoController = BancoProyectoController::singleton_conexion();
$proyectos = $proyectoController->obtenerProyectosPorUsuario($id_usuario);
?>

<body>
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Banco de Proyectos</h3>
    </header>

    <div class="container mt-4">
        <!-- Botón para agregar proyecto -->
        <div class="d-flex justify-content-end mb-3">
            <a href="<?php echo BASE_URL . 'gestion' . DS . 'agregar_banco_proyecto'; ?>" class="btn btn-danger">
                <i class="fas fa-plus-circle"></i> Agregar Proyecto
            </a>
        </div>

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
                    <td><?php echo $proyecto['nombre_ods']; // Mostramos el nombre del ODS ?></td>
                    <td><?php echo $proyecto['fecha_inicio']; ?></td>
                    <td><?php echo $proyecto['descripcion_estado']; // Mostramos la descripción del estado ?></td>
                    <td>
                        <?php if ($proyecto['id_estado'] == 2): ?>
                        <input type="checkbox" checked disabled>
                        <?php elseif ($proyecto['id_estado'] == 3): ?>
                        <!-- Mostrar una X en lugar del checkbox -->
                        <span style="font-size: 1.3em; color: red;">X</span>
                        <?php else: ?>
                        <input type="checkbox" disabled>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5">No tienes proyectos creados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include_once VISTA_PATH . 'pie.php';?>