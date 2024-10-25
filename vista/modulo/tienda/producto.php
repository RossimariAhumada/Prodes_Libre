<?php
include_once VISTA_PATH . 'encabezado.php';
require_once CONTROL_PATH . 'consultas_control' . DS . 'producto_control.php';

// Número máximo de productos por página
$productosPorPagina = 16; // 4 productos por fila, 4 filas

// Obtener el número total de productos
$controller = ProductoController::singleton_conexion();
$totalProductos = $controller->contarProductos(); // Nueva función para contar productos
$totalPaginas = ceil($totalProductos / $productosPorPagina);

// Página actual
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $productosPorPagina;

$productos = $controller->obtenerProductosPaginados($inicio, $productosPorPagina);
?>
<header class="bg-danger text-white text-center py-1">
    <h3 class="display-5 fw-bold">TIENDA</h3>
    <p>Objetivos y metas de desarrollo sostenible.</p>
</header>

<div class="product-container">
    <h2 class="my-4">Nuestros Productos</h2>
    <div class="row">
        <?php foreach ($productos as $producto): ?>
        <div class="col-md-3">
            <div class="product-card">
                <img src="../vista/documentos/products/<?= $producto['foto'] ?>" class="product-img img-fluid"
                    alt="Imagen del producto">
                <h5 class="mt-2"><?= $producto['nombre_prdcto'] ?></h5>
                <p class="price">$<?= number_format($producto['valor_prdcto'], 2) ?></p>
                <p class="description"><?= $producto['descripcion_prdcto'] ?></p>
                <button class="btn btn-danger btn-block">Comprar</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Paginación -->
    <div class="pagination">
        <?php if ($paginaActual > 1): ?>
        <a href="?pagina=<?= $paginaActual - 1 ?>">&laquo; Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="?pagina=<?= $i ?>" class="<?= ($i == $paginaActual) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($paginaActual < $totalPaginas): ?>
        <a href="?pagina=<?= $paginaActual + 1 ?>">Siguiente &raquo;</a>
        <?php endif; ?>
    </div>
</div>
<?php include_once VISTA_PATH . 'pie.php';?>