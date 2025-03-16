<div class="carta p-4 border-4 border-white rounded-lg bg-gray-800 text-white text-center">
    <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
    <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}"
        class="imagen-personaje mx-auto w-24 h-32">
    <p class="descripcion mt-2">{{ $carta->descripcion }}</p>
    <div class="stats mt-2">
        <p>❤️ {{ $carta->cartaable->vida }}</p>
        <p>⚔️ {{ $carta->cartaable->ataque }}</p>
        <p>🛡️ {{ $carta->cartaable->defensa }}</p>
        <p>⭐ {{ $carta->cartaable->nivel }}</p>
    </div>
</div>