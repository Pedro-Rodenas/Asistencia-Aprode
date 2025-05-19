document.addEventListener("DOMContentLoaded", function () {
    fetch("../../api/tardanza.php")
        .then(response => response.json())
        .then(data => {
            const porcentaje = data.porcentaje_tardanzas;
            const restante = 100 - porcentaje;

            const canvas = document.getElementById("grafico-dona-tardanzas");
            const ctx = canvas.getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
            gradient.addColorStop(0, "#ffc75f");
            gradient.addColorStop(1, "#ff4d4d");

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["", ""],
                    datasets: [{
                        data: [porcentaje, restante],
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
                                        return `${context.parsed.toFixed(2)}% Tardanzas`;
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
