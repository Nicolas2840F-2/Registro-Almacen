
var button = document.querySelector('.button')
var ventana = document.querySelector('.ventana')
// var


button.addEventListener('click', () => {
    button.classList.toggle('active')
    ventana.classList.toggle('active')
})



document.addEventListener('DOMContentLoaded', () => {
    animarElementos();
});

async function animarElementos() {
    var contenedor__alert = document.querySelectorAll('[data-id="contenedor__alert"]');

    for (let contenedor_alert of contenedor__alert) {
        contenedor_alert.style.animation = "slideIn 1s ease-in-out forwards";
        contenedor_alert.addEventListener('animationend', () => {
            var loader = contenedor_alert.querySelector('[data-id="loader"]')
            loader.style.animation = "loader 3s linear forwards"

            loader.addEventListener('animationend', () => {
                contenedor_alert.style.animation = "slideOut 1s ease-in-out forwards";
            })

        });
        await sleep(800);
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
