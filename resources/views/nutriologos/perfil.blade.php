<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
   <div class="min-h-screen flex">
    <div class="w-64 bg-green-800 text-white p-6 hidden md:block shadow-lg">
        <h2 class="text-2xl font-bold mb-8 italic">NutriTrack</h2>
        <nav class="space-y-4">
            <a href="#" class="block py-2.5 px-4 rounded transition bg-green-700">Mi Perfil</a>
            <a href="{{ route('pacientes.index') }}" class="block py-2.5 px-4 rounded transition hover:bg-green-700">Lista Pacientes</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left py-2.5 px-4 rounded transition hover:bg-red-600">
                    Cerrar Sesión
                </button>
            </form>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Mi Perfil Profesional</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600 font-medium">Hola, {{ $nutriologo->user->nombre }}</span>
                <img src="{{ $nutriologo->foto_url ?? 'https://via.placeholder.com/150' }}" class="w-14 h-14 rounded-full border-2 border-green-500 shadow-sm object-cover">
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 border-l-8 border-green-600">
            <h3 class="text-xl font-bold text-gray-700 mb-6 flex items-center">
                <span class="mr-2">📋</span> Datos del Especialista
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 uppercase font-bold">Cédula Profesional</p>
                    <p class="text-lg text-green-900">{{ $nutriologo->cedulaProfesional }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 uppercase font-bold">Especialidad</p>
                    <p class="text-lg text-green-900">{{ $nutriologo->especialidad }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg col-span-1 md:col-span-2">
                    <p class="text-sm text-gray-500 uppercase font-bold">Correo Electrónico</p>
                    <p class="text-lg text-green-900">{{ $nutriologo->user->correo }}</p>
                </div>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('nutriologos.edit', $nutriologo->usuario_id) }}" class="inline-block bg-yellow-500 text-white px-8 py-3 rounded-xl font-bold hover:bg-yellow-600 transition transform hover:scale-105 shadow-md">
                    Editar mis datos
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>