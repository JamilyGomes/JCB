document.addEventListener('DOMContentLoaded', function () {
    const tema = document.querySelector('.alterar-tema');
    const containerPesquisa = document.querySelector('.container_input_pesquisar');
    const inputSearch = document.querySelector('.input-search');
    const campoTexto = document.querySelector('.input_search');

    tema.addEventListener('click', function () {
        document.body.classList.toggle('light');
        document.getElementById('sun').classList.toggle('active');
        document.getElementById('moon').classList.toggle('active');
    });

    inputSearch.addEventListener('click', function (e) {
        e.stopPropagation();
        containerPesquisa.classList.toggle('active');
        if (containerPesquisa.classList.contains('active')) {
            setTimeout(() => campoTexto.focus(), 300);
        }
    });

    document.addEventListener('click', function () {
        containerPesquisa.classList.remove('active');
    });
});








// carrossel

document.addEventListener('DOMContentLoaded', () => {

    const TOTAL_PECAS = 7;
    const scene = document.getElementById('scene');
    const step = 360 / TOTAL_PECAS;
    let angle = 0;

    function girar() {
        angle -= step;
        scene.style.transform = `rotateX(0deg) rotateY(${angle}deg)`;
    }

    // autoplay
    setInterval(girar, 3000);

    // touch 
    let dragging = false;
    let startX;

    const container = scene.parentElement;

    const startDrag = (e) => {
        dragging = true;
        startX = e.clientX || e.touches[0].clientX;
    };

    const drag = (e) => {
        if (!dragging) return;
        const x = e.clientX || e.touches[0].clientX;

        if (Math.abs(x - startX) > 25) {
            angle += (x > startX ? step : -step);
            scene.style.transform = `rotateX(0deg) rotateY(${angle}deg)`;
            startX = x;
        }
    };

    const endDrag = () => dragging = false;

    container.addEventListener('mousedown', startDrag);
    container.addEventListener('touchstart', startDrag, { passive: true });

    container.addEventListener('mousemove', drag);
    container.addEventListener('touchmove', drag, { passive: true });

    document.addEventListener('mouseup', endDrag);
    document.addEventListener('touchend', endDrag);
});
