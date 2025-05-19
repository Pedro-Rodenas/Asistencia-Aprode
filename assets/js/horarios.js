document.addEventListener("DOMContentLoaded", function () {
    // Hacemos la llamada a la API para obtener los horarios
    fetch("../../api/horarios.php")
        .then(response => response.json())
        .then(data => {
            const tabla = document.querySelector("#tabla-horarios tbody");

            // Limpiar la tabla antes de agregar los nuevos datos
            tabla.innerHTML = "";

            // Recorrer los datos de los horarios y agregar filas a la tabla
            data.forEach(horario => {
                const tr = document.createElement("tr");

                // Crear las celdas para cada dato del horario
                const tdDni = document.createElement("td");
                tdDni.textContent = horario.dni;
                tr.appendChild(tdDni);

                const tdDiaSemana = document.createElement("td");
                tdDiaSemana.textContent = horario.dia_semana;
                tr.appendChild(tdDiaSemana);

                const tdHoraInicio = document.createElement("td");
                tdHoraInicio.textContent = horario.hora_inicio;
                tr.appendChild(tdHoraInicio);

                const tdHoraFin = document.createElement("td");
                tdHoraFin.textContent = horario.hora_fin;
                tr.appendChild(tdHoraFin);

                // Agregar la fila a la tabla
                tabla.appendChild(tr);
            });
        })
        .catch(error => {
            console.error('Error al cargar los horarios:', error);
        });
});
