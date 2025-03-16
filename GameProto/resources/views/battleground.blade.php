@extends('layouts.app')

@section('content')
    <div class="grid min-h-screen" style="grid-template-rows: 2fr 1fr;">
        <!-- Parte superior: tres columnas -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Columna izquierda: Jugador -->
            <div class="p-4 flex justify-center items-center">
                @foreach ($cartas as $carta)
                    @if ($carta->tipo === 'player')
                        <div class="cartaMain p-4 border-4 border-white rounded-lg bg-gray-800 text-white text-center">
                            <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
                            <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}" class="imagen-personaje mx-auto w-24 h-32">
                            <p class="descripcion mt-2">{{ $carta->descripcion }}</p>
                            <div class="statsMain mt-2 grid grid-cols-2 gap-4">
                                <p>❤️ {{ $carta->cartaable->vida }}</p>
                                <p>⚔️ {{ $carta->cartaable->ataque }}</p>
                                <p>🛡️ {{ $carta->cartaable->defensa }}</p>
                                <p>⭐ {{ $carta->cartaable->nivel }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Columna central (vacía por ahora) -->
            <div class="p-4 flex justify-center items-center"></div>

            <!-- Columna derecha: Enemigos -->
            <div class="p-4 grid justify-center items-center gap-4" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                @foreach ($cartas as $carta)
                    @if ($carta->tipo === 'monster')
                        <div class="carta p-4 border-4 border-white rounded-lg bg-gray-800 text-white text-center">
                            <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
                            <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}" class="imagen-personaje mx-auto w-24 h-32">
                            <p class="descripcion mt-2">{{ $carta->descripcion }}</p>
                            <div class="stats mt-2">
                                <p>❤️ {{ $carta->cartaable->vida }}</p>
                                <p>⚔️ {{ $carta->cartaable->ataque }}</p>
                                <p>🛡️ {{ $carta->cartaable->defensa }}</p>
                                <p>⭐ {{ $carta->cartaable->nivel }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Parte inferior: Objetos -->
        <div class="text-white text-center p-8 grid grid-cols-6 gap-4">
            <div class="p-4 rounded-lg">
                <button class="w-64 h-80 bg-cover bg-center" style="background-image: url('/img/deckPile.png');"></button>
            </div>
            @foreach ($cartas as $carta)
                @if ($carta->tipo === 'object')
                    <div class="carta p-4 border-4 border-white rounded-lg text-white text-center">
                        <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
                        <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}" class="imagen-personaje mx-auto w-24 h-32">
                        <p class="descripcion mt-2">{{ $carta->descripcion }}</p>
                        <div class="stats mt-2">
                            <p>
                                @switch($carta->cartaable->efecto->value)
                                    @case('ataque')
                                        Obtiene ⚔️ {{ $carta->cartaable->efectCant }}
                                        @break
                                    @case('defensa')
                                        Obtiene 🛡️ {{ $carta->cartaable->efectCant }}
                                        @break
                                    @case('cura')
                                        Recupera ❤️ {{ $carta->cartaable->efectCant }}
                                        @break
                                    @case('daño')
                                        Inflige 💀 {{ $carta->cartaable->efectCant }}
                                        @break
                                    @case('fuego')
                                        Hace 🔥 {{ $carta->cartaable->efectCant }} de daño
                                        @break
                                    @case('hielo')
                                        Hace ❄️ {{ $carta->cartaable->efectCant }} de daño
                                        @break
                                @endswitch
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection


<!-- <div class="carta">
    <h2 class="nombre">Dragón de Fuego</h2>
    <img src="/img/redDragon.png" alt="Red Dragon" class="imagen-personaje mx-auto">
    <p class="descripcion">Un feroz dragón de fuego. Nativos de las volcanicas islas Grugh.</p>
    <div class="stats">
        <div class="vida">
        <img src="/img/cardHearth.png" alt="Card Hearth">
        <span class="font-bold text-lg">100</span>
        </div>
        <div class="ataque">
        <img src="/img/cardSword.png" alt="Card Sword">
            <span class="font-bold text-lg">50</span>
        </div>
    </div>
</div> -->