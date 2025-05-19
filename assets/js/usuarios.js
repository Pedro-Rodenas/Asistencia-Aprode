document.addEventListener("DOMContentLoaded", function () {
    fetch("../../api/usuarios.php")
        .then(response => response.json())
        .then(usuarios => {
            const tbody = document.querySelector("#tabla-usuarios tbody");

            usuarios.forEach(usuario => {
                const fila = document.createElement("tr");

                fila.innerHTML = `
                    <td>${usuario.dni}</td>
                    <td>${usuario.nombre_completo}</td>
                    <td>${usuario.celular ?? '-'}</td>
                    <td>${usuario.puesto ?? '-'}</td>
                `;

                tbody.appendChild(fila);
            });
        });
});
