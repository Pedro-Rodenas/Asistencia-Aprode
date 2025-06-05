document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("trabajador");
    const tabla = document.getElementById("tabla-asistencias");
    const paginacionCont = document.createElement("div");
    paginacionCont.id = "paginacion";
    paginacionCont.style.marginTop = "15px";
    tabla.parentNode.after(paginacionCont);

    let asistencias = [];
    const filasPorPagina = 7;
    let paginaActual = 1;

    /* Cargar trabajadores */
    fetch("../../controller/FaltasController.php?accion=trabajadores")
        .then(res => res.json())
        .then(data => {
            data.forEach(trab => {
                const option = document.createElement("option");
                option.value = trab.dni;
                option.textContent = `${trab.nombre_completo || (trab.nombre + " " + trab.apellido)}`;
                select.appendChild(option);
            });

            /* Seleccionar automáticamente el primer trabajador y cargar sus asistencias */
            if (data.length > 0) {
                select.value = data[0].dni;
                cargarAsistencias(data[0].dni);
            }
        });

    function mostrarPagina(pagina) {
        paginaActual = pagina;
        tabla.innerHTML = "";

        const start = (pagina - 1) * filasPorPagina;
        const end = start + filasPorPagina;
        const asistenciasPagina = asistencias.slice(start, end);

        asistenciasPagina.forEach(a => {
            const fila = `<tr>
                <td>${a.fecha}</td>
                <td>${a.dni}</td>
                <td>${a.hora_entrada || '-'}</td>
                <td>${a.hora_salida || '-'}</td>
                <td>${a.estado}</td>
            </tr>`;
            tabla.innerHTML += fila;
        });

        renderPaginacion();
    }

    function renderPaginacion() {
        paginacionCont.innerHTML = "";

        const totalPaginas = Math.ceil(asistencias.length / filasPorPagina);
        if (totalPaginas <= 1) return;

        for (let i = 1; i <= totalPaginas; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.style.margin = "0 4px";
            btn.style.padding = "6px 10px";
            btn.style.border = "none";
            btn.style.borderRadius = "4px";
            btn.style.cursor = "pointer";
            btn.style.backgroundColor = (i === paginaActual) ? "#2B2D6E" : "#ccc";
            btn.style.color = (i === paginaActual) ? "#fff" : "#333";

            btn.addEventListener("click", () => mostrarPagina(i));

            paginacionCont.appendChild(btn);
        }
    }

    function cargarAsistencias(dni) {
        if (!dni) {
            tabla.innerHTML = "";
            paginacionCont.innerHTML = "";
            return;
        }
        fetch(`../../controller/FaltasController.php?accion=asistencias&dni=${dni}`)
            .then(res => res.json())
            .then(data => {
                /* Ordenar por fecha descendente (más reciente primero) */
                asistencias = data.sort((a, b) => new Date(b.fecha) - new Date(a.fecha));
                mostrarPagina(1);
            });
    }


    /* Cargar asistencias al cambiar trabajador */
    select.addEventListener("change", function () {
        cargarAsistencias(this.value);
    });
});
