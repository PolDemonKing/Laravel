@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex flex-col items-center justify-center gap-20 p-4" style="background-image: url('/img/lakeBackground.gif');">
    <!-- Texto Game Start con ancho 4/6 y altura aumentada -->
    <div class="text-black text-7xl md:text-[10rem] font-extrabold drop-shadow-lg leading-tight w-4/6 h-40 flex items-center justify-center">
        Game Start
    </div>

    <!-- Contenedor de los botones con tamaño y separación mejorados -->
    <div class="flex w-3/4 max-w-3xl justify-between">
         <a href="" class="px-12 py-6 bg-green-700/90 hover:bg-green-700 text-black text-4xl font-bold rounded-2xl shadow-xl transition duration-300"> 
            Nueva Partida
        </a>
        <a href="" class="px-12 py-6 bg-blue-700/90 hover:bg-blue-700 text-black text-4xl font-bold rounded-2xl shadow-xl transition duration-300">
            Cargar Partida
        </a>
    </div>
</div>
@endsection
