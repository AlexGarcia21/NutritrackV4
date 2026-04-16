<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="bg-green-600 p-6 text-white text-center">
            <h2 class="text-2xl font-bold uppercase">Editar: {{ $paciente->user->nombre }}</h2>
        </div>
        <form action="{{ route('pacientes.update', $paciente->usuario_id) }}" method="POST" class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-gray-600 text-sm font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ $paciente->user->nombre }}" class="w-full mt-1 p-3 border rounded-xl outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Correo</label>
                <input type="email" name="correo" value="{{ $paciente->user->correo }}" class="w-full mt-1 p-3 border rounded-xl outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Peso (kg)</label>
                <input type="number" step="0.1" name="peso" value="{{ $paciente->pesoActual }}" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Altura (m)</label>
                <input type="number" step="0.01" name="altura" value="{{ $paciente->altura }}" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="col-span-2 mt-6 flex gap-4">
                <button type="submit" class="flex-1 bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition shadow-lg">Actualizar</button>
                <a href="{{ route('pacientes.index') }}" class="flex-1 bg-gray-200 text-gray-700 font-bold py-3 rounded-xl text-center hover:bg-gray-300 transition">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>