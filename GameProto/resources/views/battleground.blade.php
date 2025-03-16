@extends('layouts.app')

@section('content')
<div class="grid min-h-screen" style="grid-template-rows: 2fr 1fr;">
    <!-- Parte superior: tres columnas -->
    <div class="grid grid-cols-3 gap-4">
        <!-- Columna izquierda: Jugador -->
        <div class="p-4 flex justify-center items-center">
            @foreach ($cartas as $carta)
                @if ($carta->tipo === 'player')
                    @component('components.playerCard', ['carta' => $carta]) @endcomponent
                @endif
            @endforeach
        </div>

        <!-- Columna central (vacía por ahora) -->
        <div class="p-4 flex justify-center items-center"></div>

        <!-- Columna derecha: Enemigos -->
        <div class="p-4 grid justify-center items-center gap-4"
            style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
            @foreach ($cartas as $carta)
                @if ($carta->tipo === 'monster')
                    @component('components.monsterCard', ['carta' => $carta]) @endcomponent
                @endif
            @endforeach
        </div>
    </div>

    <!-- Parte inferior: Objetos con grid-area -->
    <div class="text-white text-center p-8 grid w-full"
        style="grid-template-columns: repeat(6, minmax(0, 1fr)); grid-template-areas: 'boton cartas cartas cartas cartas turno'; gap: 1rem;">
        
        <!-- Columna 1: Botón para generar cartas -->
        <div class="flex justify-center items-center" style="grid-area: boton;">
            <button class="boton w-64 h-80 bg-cover bg-center" style="background-image: url('/img/deckPile.png');">
            </button>
        </div>

        <!-- Columnas 2-5: Contenedor para mostrar cartas -->
        <div id="mostrarCarta" class="grid grid-cols-6 gap-4 w-full" style="grid-area: cartas;">
            <!-- Aquí se generarán las cartas -->
        </div>

        <!-- Columna 6: Botón futuro para pasar turno -->
        <div class="flex justify-center items-center" style="grid-area: turno;">
            <button class="boton w-64 h-80 bg-cover bg-center nextBoton" style="background-image: url('/img/deckPile.png');"></button>
        </div>
    </div>

    <!-- Contenedor oculto fuera del diseño visible -->
    <div id="contenedorCartas" style="display: none;">
        @foreach ($cartas as $carta)
            @if ($carta->tipo === 'object')
                @component('components.objectCard', ['carta' => $carta]) @endcomponent
            @endif
        @endforeach
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const contenedorCartas = document.getElementById("contenedorCartas");
    const boton = document.querySelector(".boton");
    const mostrarCarta = document.querySelector("#mostrarCarta");

    // Crear array de cartas como nodos
    let cartas = Array.from(contenedorCartas.children);

    // Evento para generar cartas
    boton.addEventListener("click", () => {
        if (cartas.length > 0 && mostrarCarta.children.length < 6) {
            const randNum = Math.floor(Math.random() * cartas.length);
            const cartaSeleccionada = cartas.splice(randNum, 1)[0];

            mostrarCarta.appendChild(cartaSeleccionada);
        }
    });
});
</script>
@endsection