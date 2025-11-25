<?php
$pecas = 7;  // quantidade de peças
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trator + Mini 3D Diagonal</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: #000;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .main-image {
            position: relative;
            width: 92vw;
            max-width: 1350px;
            height: 92vh;
            max-height: 850px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 60px 140px rgba(0,0,0,0.95);
        }
        .main-image img {
            width: 100%; height: 100%; object-fit: cover;
        }

        /* MINI CARROSSEL 3D DIAGONAL - PEQUENO E DISCRETO */
        .mini-3d {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 260px;      /* tamanho pequeno */
            height: 260px;
            perspective: 1000px;
        }

        .scene {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            /* diagonal perfeita */
            transform: rotateX(42deg) rotateY(28deg) rotateZ(15deg);
            transition: transform 1.1s cubic-bezier(0.3, 0.8, 0.4, 1);
        }

        .item {
            position: absolute;
            width: 140px;
            height: 140px;
            left: 50%;
            top: 50%;
            margin-left: -70px;
            margin-top: -70px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.9);
            border: 5px solid rgba(255,255,255,0.25);
            backface-visibility: hidden;
        }

        .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* reflexo sutil */
        .item::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: -10px;
            width: 120%;
            height: 80px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            transform: rotateX(70deg);
            opacity: 0.5;
        }

        /* legenda pequena e discreta */
        .label {
            position: absolute;
            bottom: -36px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,0,0,0.85);
            color: #fff;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
            backdrop-filter: blur(8px);
            white-space: nowrap;
        }
    </style>
</head>
<body>

<div class="main-image">
    <img src="https://picsum.photos/1400/900?random=88" alt="Trator completo">

    <!-- MINI 3D DIAGONAL NO CANTO INFERIOR DIREITO -->
    <div class="mini-3d">
        <div class="scene" id="scene">
            <?php for($i = 0; $i < $pecas; $i++): ?>
                <?php $angle = $i * (360 / $pecas); ?>
                <div class="item" style="transform: rotateY(<?= $angle ?>deg) translateZ(220px);">
                    <img src="https://picsum.photos/500/500?random=<?= $i + 600 ?>" alt="Peça <?= $i+1 ?>">
                    <div class="label">
                        <?php 
                            $nomes = ['Motor', 'Carcaça', 'Transmissão', 'Cabine', 'Eixo', 'Rodas', 'Hidráulica'];
                            echo $nomes[$i] ?? "Peça ".($i+1);
                        ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<script>
    const scene = document.getElementById('scene');
    const total = <?= $pecas ?>;
    const step = 360 / total;
    let angle = 0;

    function girar() {
        angle -= step;
        scene.style.transform = `rotateX(42deg) rotateY(${angle + 28}deg) rotateZ(15deg)`;
    }

    // autoplay silencioso e elegante
    setInterval(girar, 3400);

    // toque opcional (só se quiser)
    let dragging = false;
    let startX;
    scene.parentElement.addEventListener('mousedown', e => { dragging = true; startX = e.clientX; });
    scene.parentElement.addEventListener('touchstart', e => { dragging = true; startX = e.touches[0].clientX; e.preventDefault(); });

    scene.parentElement.addEventListener('mousemove', e => {
        if (!dragging) return;
        const x = e.clientX || e.touches[0].clientX;
        if (Math.abs(x - startX) > 30) {
            angle += (x > startX ? step : -step);
            scene.style.transform = `rotateX(42deg) rotateY(${angle + 28}deg) rotateZ(15deg)`;
            startX = x;
        }
    });

    document.addEventListener('mouseup', () => dragging = false);
    document.addEventListener('touchend', () => dragging = false);
</script>

</body>
</html>