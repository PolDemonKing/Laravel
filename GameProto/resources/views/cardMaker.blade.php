@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('/img/forestBackground.gif');">
    <div class="bg-white bg-opacity-20 backdrop-blur-md p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-gray-200 mb-4 text-center">Crear Nueva Carta</h2>

        <form id="cartaForm" method="POST">
            @csrf
            <input type="hidden" id="formAction" value="{{ route('entities.store') }}">
            
        </form>
    </div>
</div>
@endsection