document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional

    const username = document.getElementById('txtusername').value;
    const password = document.getElementById('txtpassword').value;
    const errorMessage = document.getElementById('error-message'); // Un div donde mostraremos el error si lo hay

    // Verificamos si los campos están vacíos
    if (!username || !password) {
        errorMessage.textContent = 'Por favor, ingresa ambos campos';
        errorMessage.classList.add('show'); // Mostrar el mensaje de error
        return;
    }

    try {
        // Realizamos la petición a la API de validación
        const response = await fetch('/controllers/controladorLogin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                txtusername: username,
                txtpassword: password
            })
        });

        if (response.ok) {
            // Si la respuesta es ok (200), redirigimos al dashboard
            window.location.href = '/controllers/controladorDashboard.php';
        } else {
            // Manejo de errores basado en el código de estado HTTP
            if (response.status == 400) {
                errorMessage.textContent = 'Usuario no encontrado';
            } else if (response.status == 401) {
                errorMessage.textContent = 'Contraseña incorrecta';
            } else {
                errorMessage.textContent = 'Hubo un problema al procesar la solicitud. Intenta nuevamente.';
            }
            errorMessage.classList.add('show'); // Mostrar el mensaje de error
        }
    } catch (error) {
        // Si hay algún error en la conexión o la petición
        errorMessage.textContent = 'Hubo un problema con la conexión. Intenta nuevamente.';
        errorMessage.classList.add('show'); // Mostrar el mensaje de error
    }
});
