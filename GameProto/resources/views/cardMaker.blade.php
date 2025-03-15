@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('/img/greenBack.gif');">
    <!-- Se aplica un degradado en el fondo del formulario -->
    <div class="bg-gradient-to-br from-white via-gray-100 to-transparent backdrop-blur-lg p-8 rounded-lg shadow-xl w-full max-w-lg border border-gray-300">
        <h2 class="text-4xl font-bold text-gray-700 mb-6 text-center">Crear Nueva Carta</h2>
        <form id="cartaForm" method="POST" class="space-y-6">
            <input type="hidden" id="formAction" value="{{ route('entities.store') }}">

            <!-- Selección de Tipo -->
            <div>
                <label class="block text-lg font-medium text-gray-600">Tipo</label>
                <select id="tipoGeneral" required class="mt-1 block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                    <option value="objeto">Objeto</option>
                    <option value="entity">Entity</option>
                </select>
            </div>

            <!-- Campos Generales -->
            <div>
                <label class="block text-lg font-medium text-gray-600">Nombre</label>
                <input type="text" name="nombre" required class="mt-1 block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
            </div>

            <!-- Campos específicos para "Entity" -->
            <div id="entityFields" class="conditional-fields space-y-4" style="display: none;">
                <label class="block text-lg font-medium text-gray-600">Tipo de Entidad</label>
                <select name="tipo" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                    <option value="monster">Monstruo</option>
                    <option value="player">Jugador</option>
                    <option value="npc">NPC</option>
                </select>
                <label class="block text-lg font-medium text-gray-600">Vida</label>
                <input type="number" name="vida" min="1" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Ataque</label>
                <input type="number" name="ataque" min="0" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Defensa</label>
                <input type="number" name="defensa" min="0" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Nivel</label>
                <input type="number" name="nivel" min="1" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Descripción</label>
                <textarea name="descripcion_entity" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition"></textarea>
            </div>

            <!-- Campos específicos para "Objeto" -->
            <div id="objetoFields" class="conditional-fields space-y-4" style="display: none;">
                <label class="block text-lg font-medium text-gray-600">Tipo de Objeto</label>
                <select name="tipo" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                    <option value="object">Object</option>
                </select>
                <label class="block text-lg font-medium text-gray-600">Efecto</label>
                <select name="efecto" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                    @foreach (\App\Enums\Efecto::cases() as $efecto)
                        <option value="{{ $efecto->value }}">{{ $efecto->name }}</option>
                    @endforeach
                </select>
                <label class="block text-lg font-medium text-gray-600">Cantidad de Efecto</label>
                <input type="number" name="efectCant" min="1" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Coste</label>
                <input type="number" name="coste" min="0" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition">
                <label class="block text-lg font-medium text-gray-600">Descripción</label>
                <textarea name="descripcion_objeto" class="block w-full rounded-lg bg-gray-100 border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 hover:shadow-md transition"></textarea>
            </div>

            <!-- Botón con gradiente -->
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring focus:ring-indigo-300 transition">
                Crear Carta
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const tipoGeneral = document.getElementById("tipoGeneral");
    const form = document.getElementById("cartaForm");
    const conditionalFields = document.querySelectorAll(".conditional-fields");

    const toggleFields = () => {
        conditionalFields.forEach(fields => {
            fields.style.display = "none"; // Oculta los campos no seleccionados
            fields.querySelectorAll("input, select, textarea").forEach(field => {
                if (fields.style.display === "none") field.value = ""; // Limpia valores de campos ocultos
            });
        });

        // Muestra los campos seleccionados
        const target = tipoGeneral.value === "objeto" ? "objetoFields" : "entityFields";
        document.getElementById(target).style.display = "block";
        form.action = tipoGeneral.value === "objeto" 
            ? "{{ route('objetos.store') }}" 
            : "{{ route('entities.store') }}";
    };

    tipoGeneral.addEventListener("change", toggleFields);
    toggleFields();

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        formData.append("tipoGeneral", tipoGeneral.value);

        // Mapea correctamente las descripciones al backend
        if (tipoGeneral.value === "objeto") {
            formData.set("descripcion", formData.get("descripcion_objeto"));
        } else if (tipoGeneral.value === "entity") {
            formData.set("descripcion", formData.get("descripcion_entity"));
        }

        console.log("Datos enviados:", Object.fromEntries(formData.entries()));

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
        })
        .then(data => {
            console.log("Respuesta del servidor:", data);
            alert("Carta creada correctamente");
        })
        .catch(error => {
            console.error("Error en la petición:", error);
            alert("Error al crear la carta. Revisa la consola para más detalles.");
        });
    });
});
</script>
@endsection