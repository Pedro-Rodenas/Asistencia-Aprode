<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenidos - Aprode Perú</title>
    <link rel="stylesheet" href="../assets/css/welcome.css">
    <link rel="manifest" href="../manifest.json">
</head>

<body>

    <div class="stars" id="star-container"></div>

    <div class="content">
        <div class="title">Bienvenidos al sistema de asistencia de Aprode Perú</div>
        <div class="loader"></div>
    </div>

    <script>
        const container = document.getElementById('star-container');
        const totalStars = 50;

        for (let i = 0; i < totalStars; i++) {
            const star = document.createElement('div');
            star.classList.add('star');

            const startX = Math.random() * window.innerWidth;
            const startY = Math.random() * window.innerHeight;
            star.style.left = `${startX}px`;
            star.style.top = `${startY}px`;

            const duration = 3 + Math.random() * 5;
            const delay = Math.random() * 5;
            star.style.animationDuration = `${duration}s`;
            star.style.animationDelay = `${delay}s`;

            container.appendChild(star);
        }

        setTimeout(() => {
            window.location.href = 'asistencia.php';
        }, 4000);
    </script>

</body>

</html>