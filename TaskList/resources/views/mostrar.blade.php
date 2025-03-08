<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-3xl p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Lista de Tareas</h2>

        <div class="space-y-4">
            @foreach ($tareas as $tarea)
                <div class="bg-white p-4 rounded-lg shadow-md border border-gray-200">
                    <p class="text-gray-500 text-sm">ID: <span class="font-semibold">{{ $tarea->id }}</span></p>
                    <h3 class="text-lg font-bold text-gray-800">{{ $tarea->title }}</h3>
                    <p class="text-gray-700">{{ $tarea->desc }}</p>
                    
                    <div class="mt-2 flex justify-between items-center">
                        <p class="text-sm text-gray-600">
                            Estado: 
                            <span class="{{ $tarea->isComplete ? 'text-green-500' : 'text-red-500' }}">
                                {{ $tarea->isComplete ? 'Completado' : 'Pendiente' }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-600">📅 {{ $tarea->data }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-center">
            <a href="/create" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">
                Crear nueva tarea
            </a>
        </div>
    </div>

</body>
</html>