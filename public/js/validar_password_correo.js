


/*************VALIDADOR DE CONTRASEÑA Y CORREO*****************/
document.getElementById('formu').addEventListener('submit', function (event) {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{1,8}$/;

    // Elimina las alertas anteriores
    document.getElementById('alert-container').innerHTML = '';

    // Validar que el correo tenga un formato válido
    if (!emailRegex.test(email)) {
        mostrarAlerta('El correo electrónico debe tener un formato válido (por ejemplo, usuario@dominio.com).', 'danger');
        event.preventDefault(); // Evitar el envío del formulario
        return;
    }

    // Validar que las contraseñas coincidan
    if (password !== confirmPassword) {
        mostrarAlerta('Las contraseñas no coinciden.', 'danger');
        event.preventDefault(); // Evitar el envío del formulario
        return;
    }

    // Validar que la contraseña cumpla los requisitos
    if (!passwordRegex.test(password)) {
        mostrarAlerta('La contraseña debe tener la primera letra en mayúscula, al menos un número y no más de 8 caracteres.', 'danger');
        event.preventDefault(); // Evitar el envío del formulario
        return;
    }
});

// Función para mostrar alertas con Bootstrap
function mostrarAlerta(mensaje, tipo) {
    let alertContainer = document.getElementById('alert-container');
    let alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${tipo} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    alertContainer.appendChild(alertDiv);

    // Cerrar la alerta automáticamente después de 7 segundos (7000 milisegundos)
    setTimeout(function () {
        alertDiv.classList.remove('show');
        alertDiv.classList.add('hide');
        setTimeout(() => alertDiv.remove(), 500);  // Remover el elemento del DOM
    }, 7000);
}
