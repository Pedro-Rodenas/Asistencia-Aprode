async function cargarFaltas() {
    try {
        const res = await fetch('../../controller/FaltasController.php?accion=listar');
        const faltas = await res.json();

        const tbody = document.querySelector('#tablaFaltas tbody');
        tbody.innerHTML = '';

        if (faltas.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5">No hay faltas registradas</td></tr>';
            return;
        }

        faltas.forEach(falta => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${falta.dni}</td>
                <td>${falta.nombre_completo}</td>
                <td>${falta.fecha}</td>
                <td>${falta.estado}</td>
                <td>
                    <button class="btnJustificar" data-dni="${falta.dni}" data-fecha="${falta.fecha}">
                        Justificar
                    </button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        document.querySelectorAll('.btnJustificar').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                const dni = e.target.dataset.dni;
                const fecha = e.target.dataset.fecha;

                const formData = new FormData();
                formData.append('accion', 'justificar');
                formData.append('dni', dni);
                formData.append('fecha', fecha);

                const res = await fetch('../../controller/FaltasController.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await res.json();
                alert(data.message);

                if (data.status === 'ok') {
                    cargarFaltas();
                }
            });
        });

    } catch (error) {
        console.error('Error al cargar faltas:', error);
    }
}

document.addEventListener('DOMContentLoaded', cargarFaltas);
