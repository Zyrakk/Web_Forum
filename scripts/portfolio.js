async function fetchGitHubRepo() {
    const response = await fetch("https://api.github.com/repos/Zyrakk/MiniSec");
    const data = await response.json();
    document.getElementById("repo-description_1").innerText = data.description || "Sin descripción disponible.";
}
fetchGitHubRepo();

document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const navContainer = document.querySelector(".nav-container");

    if (menuToggle && navContainer) {
        menuToggle.addEventListener("click", function () {
            navContainer.classList.toggle("active");
        });
    }
});

