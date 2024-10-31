<?php
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
                <th>Fecha Final</th>
                <th>Descripción</th>
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
                <td><?php echo $proyecto['fecha_final']; ?></td>
                <td><?php echo $proyecto['descripcion_proyecto']; ?></td>
                <td><?php echo $proyecto['descripcion_estado']; ?></td>
                <td>
                    <input type="checkbox" id="estado-<?php echo $proyecto['id_proyecto']; ?>"
                        <?php echo ($proyecto['id_estado'] == 8) ? 'checked' : ''; ?>
                        onchange="actualizarEstado(<?php echo $proyecto['id_proyecto']; ?>, <?php echo $proyecto['id_estado']; ?>)">
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


<script>
function actualizarEstado(idProyecto, estadoActual) {
    if (confirm("¿Estás seguro de que deseas actualizar el estado del proyecto?")) {
        // Incrementar el estado en 1
        var nuevoEstado = estadoActual + 1;
        if (nuevoEstado > 8) {
            nuevoEstado = 8; // Limitar el estado a un máximo de 8
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "actualizar_estado_proyecto.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // Mostrar mensaje de éxito o error
                location.reload(); // Refrescar la página para ver el cambio
            }
        };
        xhr.send("id_proyecto=" + idProyecto + "&nuevo_estado=" + nuevoEstado);
    } else {
        // Si el usuario cancela, revertir el checkbox
        document.getElementById("estado-" + idProyecto).checked = (estadoActual == 8);
    }
}

</script>
