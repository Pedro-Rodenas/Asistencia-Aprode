document.addEventListener("DOMContentLoaded", function () {
    fetch("../../api/asistencias.php")
        .then(response => response.json())
        .then(data => {
            const tabla = document.querySelector("#tabla-asistencias tbody");
            tabla.innerHTML = "";

            data.forEach(row => {
                const tr = document.createElement("tr");

                ["dni", "nombre_completo", "fecha", "hora_entrada", "hora_salida", "estado"].forEach(field => {
                    const td = document.createElement("td");
                    td.textContent = row[field] ?? "-";
                    td.setAttribute("data-label", field.replace("_", " ").toUpperCase());
                    tr.appendChild(td);
                });

                tabla.appendChild(tr);
            });
        })
        .catch(error => {
            console.error("Error al cargar asistencias:", error);
        });
});
