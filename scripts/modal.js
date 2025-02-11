// Función para abrir el modal
function openModal() {
    document.getElementById("userModal").style.display = "block";
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("userModal").style.display = "none";
}

// Función para actualizar usuario/contraseña en la base de datos
function updateCredentials() {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!username && !password) {
        alert("Introduce un nuevo usuario o contraseña.");
        return;
    }

    fetch("/Config/update_credentials.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Cambios guardados correctamente.");
            closeModal();
        } else {
            alert("Error: " + data.detail);
        }
    })
    .catch(error => console.error("Error:", error));
}
