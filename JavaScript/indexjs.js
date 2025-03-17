// Espera a que el contenido del DOM esté completamente cargado antes de ejecutar el script
document.addEventListener("DOMContentLoaded", function () {

    // Selecciona todos los enlaces que comienzan con "#" (enlaces internos de la página)
    const enlacesSuaves = document.querySelectorAll('a[href^="#"]');

    // Recorre cada uno de los enlaces encontrados
    enlacesSuaves.forEach(function (enlace) {
        enlace.addEventListener("click", function (event) {
            // Evita que el enlace realice su comportamiento por defecto (navegar bruscamente)
            event.preventDefault();

            const destinoId = this.getAttribute("href");
            const destinoElemento = document.querySelector(destinoId);
            
            if (destinoElemento) {
                const offsetTop = destinoElemento.offsetTop;

                // Desplaza la página suavemente hasta la posición del elemento destino
                window.scrollTo({
                    top: offsetTop,
                    behavior: "smooth"
                });
            }
        });
    });
});
