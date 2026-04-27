<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-extrabold text-green-700 italic">NutriTrack</h1>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mt-1">Panel de Especialista</p>
        </div>
        
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
            <a href="{{ route ('agenda') }}"class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Agenda</span>
            </a>
            <a href="{{ route('pacientes.index') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-hospital-user"></i>
                <span>Pacientes</span>
            </a>
            <a href="{{ route('planificador') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-utensils"></i>
                <span>Planes de Dieta</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-user-doctor"></i>
                <span>Mi Perfil</span>
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 p-3 rounded-xl text-red-500 hover:bg-red-50 transition font-semibold">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
            <h2 class="text-lg font-semibold text-gray-800">Perfil Profesional</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500 font-medium">Hola, {{ $nutriologo->user->nombre }}</span>
                <img src="{{ $nutriologo->foto_url ?? 'https://via.placeholder.com/150' }}" class="w-10 h-10 rounded-full border border-green-200 object-cover">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-32 bg-gradient-to-r from-green-600 to-green-700"></div>
                    
                    <div class="px-8 pb-8">
                        <div class="relative flex justify-between items-end -mt-12 mb-6">
                            <img src="{{ $nutriologo->foto_url ?? 'https://via.placeholder.com/150' }}" class="w-24 h-24 rounded-2xl border-4 border-white shadow-lg object-cover bg-white">
                            <a href="{{ route('nutriologos.edit', $nutriologo->usuario_id) }}" class="bg-white border border-gray-200 text-gray-700 px-6 py-2 rounded-xl font-bold hover:bg-gray-50 transition shadow-sm">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Editar Perfil
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $nutriologo->user->nombre }}</h3>
                                <p class="text-green-600 font-medium flex items-center">
                                    <i class="fa-solid fa-certificate mr-2 text-sm"></i>{{ $nutriologo->especialidad }}
                                </p>
                            </div>

                            <div class="flex md:justify-end items-center">
                                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-xs font-bold tracking-wide uppercase">
                                    Cédula: {{ $nutriologo->cedulaProfesional }}
                                </span>
                            </div>
                        </div>

                        <hr class="my-8 border-gray-100">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-2">Información de Contacto</p>
                                <div class="flex items-center space-x-3 text-gray-700">
                                    <i class="fa-solid fa-envelope text-gray-400"></i>
                                    <span class="font-medium">{{ $nutriologo->user->correo }}</span>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-2">Estatus de Cuenta</p>
                                <div class="flex items-center space-x-3 text-green-600">
                                    <i class="fa-solid fa-check-circle"></i>
                                    <span class="font-bold uppercase text-xs">Especialista Verificado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>