// Selecciona todos los elementos con la clase 'nav-hover'
document.querySelectorAll('.nav-hover').forEach(link => {
    // Agrega un event listener para el evento 'mouseenter'
    link.addEventListener('mouseenter', function() {
        // Cuando el mouse entra en el enlace, añade la clase 'hovered'
        // Esto aplicará el estilo definido para el estado hover
        this.classList.add('hovered');
    });

    // Agrega un event listener para el evento 'mouseleave'
    link.addEventListener('mouseleave', function() {
        // Cuando el mouse sale del enlace, elimina la clase 'hovered'
        // Esto quitará el estilo definido para el estado hover
        this.classList.remove('hovered');
    });
});


/*******OCULTAR NAV MENU INGRESO******** */
function toggleProfile() {
    var profileMenu = document.getElementById("profileMenu");
    profileMenu.classList.toggle("show");
}