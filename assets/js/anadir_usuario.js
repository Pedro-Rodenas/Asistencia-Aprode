let listaUsuarios = [];

document.addEventListener("DOMContentLoaded", () => {
    cargarUsuarios();

    const form = document.getElementById("formUsuario");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const datos = Object.fromEntries(formData.entries());
        const esNuevo = datos.modo === "crear";

        const url = "../../api/anadir_usuarios.php";
        const metodo = esNuevo ? "POST" : "PUT";

        fetch(url, {
            method: metodo,
            body: JSON.stringify(datos),
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(() => {
                form.reset();
                cerrarFormulario();
                cargarUsuarios();
            })
            .catch(error => console.error("Error guardando usuario:", error));
    });

    // Cierra modal al hacer clic en fondo oscuro
    document.getElementById("overlay").addEventListener("click", cerrarFormulario);
});

// Cargar usuarios
function cargarUsuarios() {
    fetch("../../api/anadir_usuarios.php")
        .then(res => res.json())
        .then(data => {
            listaUsuarios = data;
            const tbody = document.querySelector("#tabla-usuarios tbody");
            tbody.innerHTML = "";

            data.forEach(usuario => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${usuario.dni}</td>
                    <td>${usuario.nombre_completo}</td>
                    <td>${usuario.correo || "-"}</td>
                    <td>${usuario.puesto || "-"}</td>
                    <td>
                        <button onclick="editarUsuarioPorDni('${usuario.dni}')">✏️</button>
                        <button onclick="deshabilitarUsuario('${usuario.dni}')">🗑️</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(error => console.error("Error cargando usuarios:", error));
}

// Abrir modal con animación
function abrirFormulario() {
    document.getElementById("formUsuario").reset();
    document.getElementById("form-titulo").textContent = "Nuevo Usuario";
    document.querySelector("input[name='modo']").value = "crear";

    // Mostrar campo de contraseña solo al crear
    document.querySelector("input[name='password']").parentElement.style.display = "block";

    document.getElementById("formulario-usuario").classList.add("visible");
    document.getElementById("overlay").classList.add("visible");
}

// Cerrar modal con animación
function cerrarFormulario() {
    document.getElementById("formulario-usuario").classList.remove("visible");
    document.getElementById("overlay").classList.remove("visible");
}

// Buscar usuario por DNI
function editarUsuarioPorDni(dni) {
    const usuario = listaUsuarios.find(u => u.dni === dni);
    if (!usuario) return alert("Usuario no encontrado");
    editarUsuario(usuario);
}

// Editar usuario (rellena el formulario)
function editarUsuario(usuario) {
    abrirFormulario();
    document.getElementById("form-titulo").textContent = "Editar Usuario";

    for (let campo in usuario) {
        const input = document.querySelector(`#formUsuario [name="${campo}"]`);
        if (input) input.value = usuario[campo];
    }

    document.querySelector("input[name='modo']").value = "editar";
    document.querySelector("input[name='password']").parentElement.style.display = "none"; // Oculta contraseña
}

// Deshabilitar
function deshabilitarUsuario(dni) {
    if (!confirm("¿Deseas deshabilitar este usuario?")) return;

    fetch("../../api/anadir_usuarios.php", {
        method: "DELETE",
        body: JSON.stringify({ dni }),
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then(() => cargarUsuarios())
        .catch(err => console.error("Error deshabilitando usuario:", err));
}
