const switchButton = document.getElementById('switch');

// Si no hay tema guardado en localStorage, inicializamos en light
if (localStorage.getItem("tema") === null) {
    var tema = 'light';
    document.body.classList.add('light'); // Añadimos el tema inicial al body
} else {
    var tema = localStorage.getItem("tema");
    document.body.classList.add(tema); // Añadimos el tema guardado en el body
}

function changeTheme() {
    if (tema === 'light') {
        document.body.classList.remove('light');
        document.body.classList.add('dark');
        tema = 'dark';
    } else {
        document.body.classList.remove('dark');
        document.body.classList.add('light');
        tema = 'light';
    }
}

// Cambia el tema al hacer clic en el interruptor dentro del dropdown
switchButton.addEventListener('click', (e) => {
    e.preventDefault(); // Evitar el comportamiento por defecto del enlace
    changeTheme();
    localStorage.setItem("tema", tema);  // Guarda el tema en localStorage
});
