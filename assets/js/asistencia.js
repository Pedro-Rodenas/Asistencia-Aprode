const dniInput = document.getElementById('dni');
const btnLlegada = document.getElementById('btn-llegada');
const btnSalida = document.getElementById('btn-salida');
const respuestaDiv = document.getElementById('respuesta');

dniInput.addEventListener('input', () => {
    const dni = dniInput.value.trim();
    if (dni.length === 8) {
        verificarDni(dni);
    } else {
        // Limpia todo si aún no se completa el DNI
        limpiarInterfaz();
    }
});

async function verificarDni(dni) {
    try {
        const res = await fetch(`../controller/AsistenciaController.php?action=verificar&dni=${dni}`);
        const data = await res.json();

        console.log(data);

        if (data.status === 'ok') {
            mostrarDatosTrabajador(data.trabajador);
            actualizarBotones(data.tipo);
        } else {
            mostrarMensaje(data.mensaje || "No se pudo verificar.");
            deshabilitarBotones();
        }
    } catch (error) {
        console.error("Error al verificar DNI:", error);
        mostrarMensaje("Ya se registro la asistencia del día");
        deshabilitarBotones();
    }
}

function mostrarDatosTrabajador(t) {
    respuestaDiv.innerHTML = `
        <div class="info-linea"><strong>Bienvenido:</strong><span>${t.nombre}</span></div>
        <div class="info-linea"><strong>DNI:</strong><span>${t.dni}</span></div>
        <div class="info-linea"><strong>Correo:</strong><span>${t.correo}</span></div>
        <div class="info-linea"><strong>Teléfono:</strong><span>${t.celular}</span></div>
        <div class="info-linea"><strong>Puesto:</strong><span>${t.puesto}</span></div>
    `;
}

function actualizarBotones(tipo) {
    if (tipo === 'entrada') {
        btnLlegada.disabled = false;
        btnSalida.disabled = true;
    } else if (tipo === 'salida') {
        btnLlegada.disabled = true;
        btnSalida.disabled = false;
    } else {
        btnLlegada.disabled = true;
        btnSalida.disabled = true;
    }
}

function limpiarInterfaz() {
    respuestaDiv.innerHTML = '';
    deshabilitarBotones();
}

function deshabilitarBotones() {
    btnLlegada.disabled = true;
    btnSalida.disabled = true;
}

function mostrarMensaje(mensaje) {
    respuestaDiv.innerText = mensaje;
}

/* Marcar Llegada */
btnLlegada.addEventListener('click', async () => {
    const dni = dniInput.value.trim();
    const res = await fetch('../controller/AsistenciaController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ accion: 'llegada', dni })
    });

    const data = await res.json();
    mostrarMensaje(data.message);

    if (data.status === 'ok') {
        btnLlegada.disabled = true;
        btnSalida.disabled = false;
        location.reload();
    }
});

/* Marcar Salida */
btnSalida.addEventListener('click', async () => {
    const dni = dniInput.value.trim();

    try {
        const res = await fetch('../controller/AsistenciaController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ accion: 'salida', dni })
        });

        const data = await res.json();
        mostrarMensaje(data.message || 'Respuesta recibida.');

        if (data.status === 'ok') {
            btnSalida.disabled = true;
            location.reload();
        }
    } catch (error) {
        mostrarMensaje('Error de conexión: ' + error.message);
    }
});
