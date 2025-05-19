let datosOriginales = [];

document.addEventListener("DOMContentLoaded", function () {
    const tabla = document.querySelector("#tabla-asistencias tbody");
    const filtroFecha = document.getElementById("filtro-fecha");

    // Obtener la fecha de hoy en formato YYYY-MM-DD
    const hoy = new Date().toISOString().split("T")[0];
    filtroFecha.value = hoy;

    // Cargar asistencias
    fetch("../../api/asistencias.php")
        .then(response => response.json())
        .then(data => {
            datosOriginales = data;

            // Filtrar por la fecha de hoy
            const filtrados = datosOriginales.filter(item => item.fecha === hoy);
            renderizarTabla(filtrados);
        })
        .catch(error => {
            console.error("Error al cargar asistencias:", error);
        });

    // Escuchar cambios en el input de fecha
    filtroFecha.addEventListener("change", () => {
        const fechaSeleccionada = filtroFecha.value;
        if (!fechaSeleccionada) {
            renderizarTabla(datosOriginales);
            return;
        }

        const filtrados = datosOriginales.filter(item => item.fecha === fechaSeleccionada);
        renderizarTabla(filtrados);
    });

    function renderizarTabla(datos) {
        tabla.innerHTML = "";

        if (datos.length === 0) {
            const tr = document.createElement("tr");
            const td = document.createElement("td");
            td.colSpan = 6;
            td.textContent = "No hay registros para esta fecha.";
            td.style.textAlign = "center";
            tr.appendChild(td);
            tabla.appendChild(tr);
            return;
        }

        datos.forEach(row => {
            const tr = document.createElement("tr");

            ["dni", "nombre_completo", "fecha", "hora_entrada", "hora_salida", "estado"].forEach(field => {
                const td = document.createElement("td");
                td.textContent = row[field] ?? "-";
                td.setAttribute("data-label", field.replace("_", " ").toUpperCase());
                tr.appendChild(td);
            });

            tabla.appendChild(tr);
        });
    }
});
