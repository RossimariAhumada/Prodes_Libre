document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario realice una recarga completa

    const query = document.getElementById('search-input').value.trim();

    if (query) {
        // Redirige a la página de resultados con el término de búsqueda como parámetro en la URL
        window.location.href = `<?php echo BASE_URL . 'Category' . DS . 'resultados'; ?>?query=${encodeURIComponent(query)}`;
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const query = "<?php echo $query; ?>"; // Término de búsqueda obtenido de la URL
    const results = document.querySelectorAll('.result');
    let found = false; // Bandera para saber si se encontró algún resultado

    results.forEach(result => {
        const textContent = result.innerText.toLowerCase();
        if (textContent.includes(query)) {
            result.style.display = 'block'; // Mostrar si contiene el término de búsqueda
            found = true; // Marcar como encontrado
        } else {
            result.style.display = 'none'; // Ocultar si no contiene el término de búsqueda
        }
    });

    // Mostrar el mensaje de "sin resultados" si no se encontró nada
    if (!found) {
        document.getElementById('no-results').style.display = 'block';
    }
});