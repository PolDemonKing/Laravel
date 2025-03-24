<script>
document.addEventListener("DOMContentLoaded", () => {
    const contenedorCartas = document.getElementById("contenedorCartas");
    const boton = document.querySelector(".boton");
    const mostrarCarta = document.querySelector("#mostrarCarta");

    let mano = [];
    let pila_descartes = [];

    let cartas = Array.from(contenedorCartas.children);

    function guardarPartida() {
        fetch("/partida/guardar", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ mano: mano.map(carta => carta.dataset.id) }),
        });
    }

    function cargarPartida() {
        fetch("/partida/cargar")
            .then(res => res.json())
            .then(data => {
                if (data.partida) {
                    let partida = JSON.parse(data.partida.datos);
                    partida.mano.forEach(cartaID => {
                        let carta = document.querySelector(`#contenedorCartas [data-id='${cartaID}']`);
                        if (carta) {
                            let nuevaCarta = carta.cloneNode(true);
                            mostrarCarta.appendChild(nuevaCarta);
                            mano.push(nuevaCarta);
                        }
                    });
                }
            });
    }

    boton.addEventListener("click", () => {
        if (cartas.length === 0) {
            // Si no quedan cartas, reabastecemos la baraja con los descartes
            cartas = [...pila_descartes];
            pila_descartes = [];
        }

        if (cartas.length > 0 && mano.length < 6) {
            let carta = cartas.splice(Math.floor(Math.random() * cartas.length), 1)[0];
            let nuevaCarta = carta.cloneNode(true); // Clonamos la carta para no eliminarla
            mostrarCarta.appendChild(nuevaCarta);
            mano.push(nuevaCarta);
            guardarPartida();
        }
    });

    mostrarCarta.addEventListener("click", (event) => {
        let cartaClickeada = event.target.closest(".carta");
        if (!cartaClickeada) return;

        if (event.ctrlKey) {  // Usamos "Ctrl + Click" para descartar
            mano = mano.filter(carta => carta !== cartaClickeada);
            pila_descartes.push(cartaClickeada);
            cartaClickeada.remove();
            guardarPartida();
        } else { // Click normal selecciona la carta
            document.querySelectorAll(".carta").forEach(c => c.classList.remove("seleccionada"));
            cartaClickeada.classList.add("seleccionada");
        }
    });

    cargarPartida();
});
</script>