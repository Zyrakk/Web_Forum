document.addEventListener('DOMContentLoaded', function() {
    // Selecciona el botón
    const btn = document.querySelector('.btn');

    // Agrega el evento de clic
    btn.addEventListener('click', function(event) {
        // Alterna la clase "open" en el botón para mostrar/ocultar el menú
        btn.classList.toggle('open');
    });

    // Opcional: Cierra el menú si se hace clic fuera del botón
    document.addEventListener('click', function(event) {
        if (!btn.contains(event.target)) {
            btn.classList.remove('open');
        }
    });
});
