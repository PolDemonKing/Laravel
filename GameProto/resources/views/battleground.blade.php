@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-3 gap-4">
        @foreach ($cartas as $carta)
        <div class="carta p-4 border-4 border-white rounded-lg bg-gray-800 text-white text-center">
            <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
            <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}" class="imagen-personaje mx-auto w-24 h-32">
            <p class="descripcion mt-2">{{ $carta->descripcion }}</p>
            
            @if ($carta->tipo === 'monster' || $carta->tipo === 'player')
            <div class="stats mt-2">
                <p>❤️ {{ $carta->cartaable->vida }}</p>
                <p>⚔️ {{ $carta->cartaable->ataque }}</p>
                <p>🛡️ {{ $carta->cartaable->defensa }}</p>
                <p>⭐ {{ $carta->cartaable->nivel }}</p>
            </div>
            @elseif ($carta->tipo === 'object')
            <div class="stats mt-2">
                <p>🎭</p>
                @if (isset($carta->cartaable->vida))
                    <p>Recupera ❤️ {{ $carta->cartaable->vida }}</p>
                @elseif (isset($carta->cartaable->defensa))
                    <p>Obtiene 🛡️ {{ $carta->cartaable->defensa }}</p>
                @elseif (isset($carta->cartaable->ataque))
                    <p>Obtiene ⚔️ {{ $carta->cartaable->ataque }}</p>
                @elseif (isset($carta->cartaable->nivel))
                    <p>Aumenta ⭐ {{ $carta->cartaable->nivel }} niveles</p>
                @endif
            </div>
            @endif
        </div>
        @endforeach
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