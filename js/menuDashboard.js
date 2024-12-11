// Seleccionamos todos los elementos que actúan como botones para mostrar/ocultar el submenú
const menuItems = document.querySelectorAll('.menu-item');

// Añadimos el evento de clic para cada ítem del menú
menuItems.forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault(); // Evita que se recargue la página

        // Accedemos al submenú correspondiente al ítem clickeado
        const submenu = item.nextElementSibling;
        const flecha = item.querySelector('.flecha');

        // Solo cambiamos la visibilidad del submenú si no está expandido
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
            flecha.classList.remove('rotada'); // Quita la rotación
        } else {
            submenu.style.display = 'block';
            flecha.classList.add('rotada'); // Añade la rotación
        }
    });
});

// Prevenir que el submenú se cierre al seleccionar un enlace dentro del submenú
const submenuItems = document.querySelectorAll('.submenu a');
submenuItems.forEach(submenuItem => {
    submenuItem.addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que el clic se propague y cierre el menú
    });
});

// Cerrar el submenú si haces clic fuera del menú
document.addEventListener('click', (event) => {
    // Verificar si el clic es fuera del submenú y del ítem del menú
    const isClickInsideMenu = document.querySelector('.sidebar').contains(event.target);
    if (!isClickInsideMenu) {
        // Ocultar todos los submenús y quitar la rotación de las flechas
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.style.display = 'none';
        });
        document.querySelectorAll('.flecha').forEach(flecha => {
            flecha.classList.remove('rotada');
        });
    }
});




document.getElementById('copyright-year').textContent = new Date().getFullYear();
