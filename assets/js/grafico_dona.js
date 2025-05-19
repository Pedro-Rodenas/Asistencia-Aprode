document.addEventListener("DOMContentLoaded", function () {
    fetch("../../api/estadisticas-asistencia.php")
        .then(response => response.json())
        .then(data => {
            const porcentajePuntuales = data.porcentaje_puntuales;
            const porcentajeRestante = 100 - porcentajePuntuales;

            const canvas = document.getElementById("grafico-dona-asistencia");
            const ctx = canvas.getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
            gradient.addColorStop(0, "#7cfff4");
            gradient.addColorStop(1, "#2B2D6E");

            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["", ""],
                    datasets: [{
                        data: [porcentajePuntuales, porcentajeRestante],
                        backgroundColor: [
                            gradient,
                            "#e0e0e0"
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '60%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    if (context.dataIndex === 0) {
                                        return `${context.parsed.toFixed(2)}% Puntuales`;
                                    }
                                    return '';
                                }
                            }
                        }
                    }
                }
            });
        });
});
