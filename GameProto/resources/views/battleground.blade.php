<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battlegrounds</title> 
    @vite('resources/css/app.css')
</head>
<body class="bg-[url(/img/mountain.jpg)]">
<div class="carta">
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
</div>

@foreach ($cartas as $carta)
<div class="carta">
    <h2 class="nombre">{{ $carta->nombre }}</h2>
    <img src="{{ asset('img/' . $carta->imagen) }}" alt="Imagen de la carta" class="imagen-personaje mx-auto">
    <p class="descripcion">{{ $carta->descripcion }}</p>
    
    @if ($carta->tipo === 'monster')
    <div class="stats">
        <p>Vida: {{ $carta->cartaable->vida }}</p>
        <p>Ataque: {{ $carta->cartaable->ataque }}</p>
        <p>Defensa: {{ $carta->cartaable->defensa }}</p>
        <p>Nivel: {{ $carta->cartaable->nivel }}</p>
    </div>
    @elseif ($carta->tipo === 'player')
    <div class="stats">
        <p>Vida: {{ $carta->cartaable->vida }}</p>
        <p>Ataque: {{ $carta->cartaable->ataque }}</p>
        <p>Defensa: {{ $carta->cartaable->defensa }}</p>
        <p>Nivel: {{ $carta->cartaable->nivel }}</p>
    </div>
    @elseif ($carta->tipo === 'object')
    <div class="stats">
        <p>Efecto: </p>
        @if (isset($carta->cartaable->vida))
            <p>Recupera {{ $carta->cartaable->vida }} puntos de vida</p>
        @elseif (isset($carta->cartaable->defensa))
            <p>Obtiene {{ $carta->cartaable->defensa }} puntos de defensa</p>
        @elseif (isset($carta->cartaable->ataque))
            <p>Obtiene {{ $carta->cartaable->ataque }} puntos de ataque</p>
        @elseif (isset($carta->cartaable->nivel))
            <p>Aumenta {{ $carta->cartaable->nivel }} niveles</p>
        @endif
    </div>
    @endif
</div>
@endforeach
</body>
</html>
