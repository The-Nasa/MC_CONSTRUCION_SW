document.addEventListener("DOMContentLoaded", () => {
    // Seleccionamos todos los elementos que pueden abrir un submenú
    const menuItems = document.querySelectorAll(".sidebar ul li > a");

    menuItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            // Evitar comportamiento por defecto si el enlace tiene un submenú
            const submenu = item.nextElementSibling;
            if (submenu && submenu.classList.contains("submenu")) {
                e.preventDefault(); // Evita que se redirija si hay un submenú
                
                // Alternar la visibilidad del submenú
                submenu.classList.toggle("active");

                // Girar la flecha (si la hay)
                const flecha = item.querySelector(".flecha");
                if (flecha) {
                    flecha.classList.toggle("rotada");
                }
            }
        });
    });
});
