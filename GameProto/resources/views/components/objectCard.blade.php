<div class="carta p-4 border-4 border-white rounded-lg text-white text-center">
    <h2 class="nombre text-lg font-bold">{{ $carta->nombre }}</h2>
    <img src="{{ asset('img/' . $carta->imagen) }}" alt="{{ $carta->nombre }}"
        class="imagen-personaje mx-auto w-24 h-32">
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