<?php
// Obtén el término de búsqueda desde la URL
$query = isset($_GET['query']) ? strtolower($_GET['query']) : '';
?>

<?php
include_once VISTA_PATH . 'encabezado.php';
?>

<body>
    <div class="container">
        <h1>Resultados de la búsqueda para "<?php echo htmlspecialchars($query); ?>"</h1>

        <div id="searchResults">
            <div class="result">
                <h3>Calidad de Educación</h3>
                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</p>
            </div>
            <div class="result">
                <h3>Salud y Bienestar</h3>
                <p>Descripción sobre salud y bienestar, calidad de vida, y Lorem Ipsum.</p>
            </div>
            <!-- Más resultados pueden ir aquí -->
        </div>

        <!-- Mensaje de "sin resultados" -->
        <div id="no-results" style="display: none;">No se encontraron resultados para su búsqueda.</div>
    </div>