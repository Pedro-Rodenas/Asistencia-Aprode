const dniInput = document.getElementById('dni');
const btnLlegada = document.getElementById('btn-llegada');
const btnSalida = document.getElementById('btn-salida');
const respuestaDiv = document.getElementById('respuesta');

// Verifica si el trabajador ya registró asistencia hoy
dniInput.addEventListener('blur', async () => {
    const dni = dniInput.value.trim();
    if (dni === '') return;

    const res = await fetch(`../controller/AsistenciaController.php?action=verificar&dni=${dni}`);
    const data = await res.json();

    console.log(data);

    if (data.status === 'ok') {

        if (data.tipo === 'entrada') {
            btnLlegada.disabled = false;
            btnSalida.disabled = true;
        } else if (data.tipo === 'salida') {
            btnLlegada.disabled = true;
            btnSalida.disabled = false;
        } else if (data.tipo === 'completo') {
            btnLlegada.disabled = true;
            btnSalida.disabled = true;
        }
    } else {
        respuestaDiv.innerText = data.mensaje || "No se pudo verificar.";
        btnLlegada.disabled = true;
        btnSalida.disabled = true;
    }
});


/* Marcar Llegada */
btnLlegada.addEventListener('click', async () => {
    const dni = dniInput.value.trim();

    const res = await fetch('../controller/AsistenciaController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ accion: 'llegada', dni })
    });

    const data = await res.json();
    respuestaDiv.innerText = data.message;

    if (data.success) {
        btnLlegada.disabled = true;
        btnSalida.disabled = false;
    }
});

// Marcar Salida
btnSalida.addEventListener('click', async () => {
    const dni = dniInput.value.trim();

    const res = await fetch('../controller/AsistenciaController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ accion: 'salida', dni })
    });

    const data = await res.json();
    respuestaDiv.innerText = data.message;

    if (data.success) {
        btnSalida.disabled = true;
    }
});
