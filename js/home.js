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