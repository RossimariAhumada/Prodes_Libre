<?php
session_start();
include_once VISTA_PATH . 'encabezado_login.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'banco_proyecto_controlador.php';

$id_usuario = $_SESSION['id_usuario'];
$proyectoController = BancoProyectoController::singleton_conexion();

// Configuración de paginación
$limite = 5; // Máximo registros por página
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $limite;

// Obtener productos y contar total
$productos = $proyectoController->obtenerProductosPaginadosPorUsuarioC($id_usuario, $inicio, $limite);
$total_productos = $proyectoController->contarProductosPorUsuarioC($id_usuario);
$total_paginas = ceil($total_productos / $limite);
?>

<body>
    <header class="bg-danger text-white text-center py-1">
        <h3 class="header-title">Compras realizadas</h3>
    </header>
    <div class="container mt-4">
        <!-- Tabla de productos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Valor</th>
                    <th>ODS</th>
                    <th>Fecha de Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($productos): ?>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['nombre_prdcto']; ?></td>
                    <td><?php echo number_format($producto['valor_prdcto'], 0, ',', '.'); ?></td>
                    <td><?php echo $producto['nombre_ods']; ?></td>
                    <td><?php echo (new DateTime($producto['fecha_compra']))->format('d-m-Y H:i:s'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="3">No tienes productos comprados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <nav aria-label="Paginación">
            <ul class="pagination justify-content-center">
                <?php if ($pagina_actual > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a>
                </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <li class="page-item <?php echo ($pagina_actual == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>

                <?php if ($pagina_actual < $total_paginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>
<?php include_once VISTA_PATH . 'pie.php';?>