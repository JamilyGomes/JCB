<?php
$imagens = [
    'motor-partida.png',
    'concha-dianteira.png',
    'bomba-transmissao.png',
    'concha-traseira.png',
    'semi-eixo.png',
    'retroescavadeira.png',
    'bomba-hidraulica.png'
];

$total = count($imagens);

// OPCIONAL: nomes para aparecer no label
// ver isso depois 
$nomes = [
    'Motor de Partida',
    'Concha Dianteira',
    'Bomba de Transmissão',
    'Concha Traseira',
    'Semi-Eixo',
    'Retroescavadeira',
    'Bomba Hidráulica'
];
?>

<div class="carrossel-3d-container">
    <div id="scene">
        <?php for ($i = 0; $i < $total; $i++): ?>
            <?php 
                $angle = $i * (360 / $total);
                $img = $imagens[$i];
                $nome = $nomes[$i] ?? "Peça " . ($i + 1);
            ?>
            <div class="item" style="transform: rotateY(<?= $angle ?>deg) translateZ(190px);">
                <img src="img/<?= $img ?>" alt="<?= $nome ?>">
                <div class="label"><?= $nome ?></div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<script>
    const TOTAL_PECAS = <?= $total ?>;
</script>
