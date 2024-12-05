document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional

    const username = document.getElementById('txtusername').value;
    const password = document.getElementById('txtpassword').value;
    const errorMessage = document.getElementById('error-message'); // Un div donde mostraremos el error si lo hay

    // Verificamos si los campos están vacíos
    if (!username || !password) {
        errorMessage.textContent = 'Por favor, ingresa ambos campos';
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

        // Si la respuesta es correcta, redirigimos al usuario
        if (response.ok) {
            const result = await response.text();
            if (result.includes('Location: ')) {
                window.location.href = result.split('Location: ')[1];
            }
        } else {
            throw new Error('Credencialessss incorrectas');
        }
    } catch (error) {
        errorMessage.textContent = error.message;
    }
});
