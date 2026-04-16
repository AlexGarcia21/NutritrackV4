<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Paciente - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="bg-green-600 p-6 text-white text-center">
            <h2 class="text-2xl font-bold uppercase tracking-widest">Registrar Nuevo Paciente</h2>
        </div>
        <form action="{{ route('pacientes.store') }}" method="POST" class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div class="col-span-2 border-b pb-2 text-green-700 font-bold uppercase text-sm">Datos Personales</div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Nombre Completo</label>
                <input type="text" name="nombre" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Correo Electrónico</label>
                <input type="email" name="correo" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-bold">Contraseña Temporal</label>
                <input type="password" name="password" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>

            <div class="col-span-2 border-b pb-2 text-green-700 font-bold uppercase text-sm mt-4">Ficha Clínica</div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Edad</label>
                <input type="number" name="edad" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Peso Actual (kg)</label>
                <input type="number" step="0.1" name="peso" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold">Altura (m)</label>
                <input type="number" step="0.01" name="altura" placeholder="Ej: 1.75" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>

            <div class="col-span-2 mt-6 flex gap-4">
                <button type="submit" class="flex-1 bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition shadow-lg">Guardar Paciente</button>
                <a href="{{ route('pacientes.index') }}" class="flex-1 bg-gray-200 text-gray-700 font-bold py-3 rounded-xl text-center hover:bg-gray-300 transition">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>