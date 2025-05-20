document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("dark-mode-toggle");
    const body = document.body;

    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        toggle.innerHTML = '<i class="fas fa-sun"></i>';
    }

    toggle.addEventListener("click", function () {
        if (body.classList.contains("dark-mode")) {
            body.classList.remove("dark-mode");
            localStorage.setItem("theme", "light");
            toggle.innerHTML = '<i class="fas fa-moon"></i>';
        } else {
            body.classList.add("dark-mode");
            localStorage.setItem("theme", "dark");
            toggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
    });
});
