<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 p-8 text-white">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-sm">
                    <i class="fa-solid fa-user-gear text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Modificar Perfil Profesional</h1>
                    <p class="text-green-100 text-sm italic">{{ $nutriologo->user->nombre }}</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <form action="{{ route('nutriologos.update', $nutriologo->usuario_id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Nombre Completo</label>
                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-4 top-4 text-gray-300"></i>
                        <input type="text" name="nombre" class="w-full pl-11 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" value="{{ $nutriologo->user->nombre }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Cédula Profesional</label>
                        <div class="relative">
                            <i class="fa-solid fa-id-card absolute left-4 top-4 text-gray-300"></i>
                            <input type="text" name="cedula" class="w-full pl-11 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" value="{{ $nutriologo->cedulaProfesional }}" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Especialidad</label>
                        <div class="relative">
                            <i class="fa-solid fa-graduation-cap absolute left-4 top-4 text-gray-300"></i>
                            <input type="text" name="especialidad" class="w-full pl-11 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" value="{{ $nutriologo->especialidad }}" required>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Foto de Perfil (URL)</label>
                    <div class="relative">
                        <i class="fa-solid fa-image absolute left-4 top-4 text-gray-300"></i>
                        <input type="url" name="foto_url" class="w-full pl-11 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" value="{{ $nutriologo->foto_url }}" placeholder="https://ejemplo.com/foto.jpg">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-600 text-white py-3 rounded-2xl font-bold shadow-lg shadow-green-200 hover:bg-green-700 transition transform hover:scale-[1.02]">
                        <i class="fa-solid fa-check mr-2"></i>Guardar Cambios
                    </button>
                    <a href="{{ route('perfil') }}" class="flex-1 bg-gray-100 text-gray-500 py-3 rounded-2xl font-bold text-center hover:bg-gray-200 transition">
                        <i class="fa-solid fa-arrow-left mr-2"></i>Cancelar y Regresar
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>