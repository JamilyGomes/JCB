document.addEventListener('DOMContentLoaded', function () {
    const tema = document.querySelector('.alterar-tema');

    tema.addEventListener('click', function () {
        document.body.classList.toggle('light');
        document.getElementById('sun').classList.toggle('active');
        document.getElementById('moon').classList.toggle('active');
    });
});
