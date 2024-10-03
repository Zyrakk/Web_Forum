// Fecha y hora de inicio del mantenimiento:
const startTime = new Date('2024-10-02T18:00:00+02:00').getTime(); 

// Fecha y hora de finalización del mantenimiento:
const endTime = new Date('2024-10-04T18:00:00+02:00').getTime();

// Tiempo total del mantenimiento en milisegundos
const totalDuration = endTime - startTime;

// Obtener los elementos del DOM
const countdownElement = document.getElementById("countdown");
const progressBar = document.getElementById("progress-bar");

// Función que actualiza la cuenta regresiva y la barra de progreso
function updateCountdown() {
    const now = new Date().getTime();  // Hora actual
    const timeLeft = endTime - now;    // Tiempo restante en milisegundos

    if (timeLeft > 0) {
        // Calcular días, horas, minutos y segundos restantes
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
        const seconds = Math.floor((timeLeft / 1000) % 60);
        //   ^ ^
        //  (O,O)
        //  (   )
        //  -"-"--

        // Mostrar la cuenta regresiva
        countdownElement.innerHTML = 
            `${days}d ${hours.toString().padStart(2, '0')}h ${minutes.toString().padStart(2, '0')}m ${seconds.toString().padStart(2, '0')}s`;

        // Calcular el progreso desde el inicio del mantenimiento
        const timePassed = now - startTime;
        const progress = (timePassed / totalDuration) * 100;

        // Actualizar el ancho de la barra de progreso
        progressBar.style.width = `${progress}%`;
    } else {
        // El mantenimiento ha terminado
        countdownElement.innerHTML = "¡El sitio ya está disponible!";
        progressBar.style.width = '100%';

        // Redirigir a la página home.php
        setTimeout(() => {
            window.location.href = "home.php";
        }, 3000); 
    }
}

// Ejecutar la actualización inmediatamente al cargar la página
updateCountdown();

// Actualizar la cuenta regresiva cada segundo
const interval = setInterval(updateCountdown, 1000);