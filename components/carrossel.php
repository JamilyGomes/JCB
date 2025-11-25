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
?>

<div class="carrossel-3d-container">
    <div id="scene">
        <?php foreach ($imagens as $index => $img): ?>
            <div class="item" style="--i: <?php echo $index; ?>">
                <img src="img/<?php echo $img; ?>" alt="Imagem da peça">
            </div>
        <?php endforeach; ?>
    </div>
</div>
