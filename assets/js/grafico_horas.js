document.addEventListener("DOMContentLoaded", function () {
    fetch("../../api/horas_trabajadas.php")
        .then(response => response.json())
        .then(data => {
            const nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            const meses = data.map(item => nombresMeses[item.mes - 1]);

            const horas = data.map(item => item.horas);

            const options = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: [{
                    name: "Horas trabajadas",
                    data: horas
                }],
                xaxis: {
                    categories: meses
                }
            };

            const chart = new ApexCharts(document.querySelector(".c-grafico-completo"), options);
            chart.render();
        });
});
