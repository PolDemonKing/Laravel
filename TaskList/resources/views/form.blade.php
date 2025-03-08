<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form action="/store" method="post" class="bg-white p-6 rounded-lg shadow-md w-96">
        @csrf
        <h2 class="text-xl font-semibold mb-4 text-center">Nueva Tarea</h2>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium">Nombre tarea:</label>
            <input type="text" id="nombre" name="nombre" required 
                class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-gray-700 font-medium">Descripción:</label>
            <input type="text" id="desc" name="desc" required 
                class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="fecha" class="block text-gray-700 font-medium">Selecciona una fecha:</label>
            <input type="date" id="fecha" name="fecha" required 
                class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <button type="submit" 
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            Enviar
        </button>
    </form>

</body>
</html>
