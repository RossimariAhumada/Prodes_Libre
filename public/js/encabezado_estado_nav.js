document.querySelectorAll('.nav-hover').forEach(link => {
    link.addEventListener('mouseenter', function() {
        this.classList.add('hovered');
    });
    link.addEventListener('mouseleave', function() {
        this.classList.remove('hovered');
    });
});
