// alterar tema ---------- fazer ajustes dps

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

    const scene = document.getElementById('scene');
    const step = 360 / TOTAL_PECAS;
    let angle = 0;

    function girar() {
        angle -= step;
        scene.style.transform = `rotateX(42deg) rotateY(${angle + 28}deg) rotateZ(15deg)`;
    }

    // autoplay
    setInterval(girar, 3400);

    // touch ------------ ver isso depois
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

})