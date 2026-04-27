<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes - NutriTrack</title>
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
            <a href="{{ route ('agenda') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Agenda</span>
            </a>
            <a href="{{ route('pacientes.index') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-hospital-user"></i>
                <span>Pacientes</span>
            </a>
            <a href="{{ route('planificador') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-utensils"></i>
                <span>Planes de Dieta</span>
            </a>
            <a href="{{ route('perfil') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
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
            <h2 class="text-lg font-semibold text-gray-800">Gestión de Pacientes</h2>
            <a href="{{ route('pacientes.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-xl font-bold hover:bg-green-700 transition shadow-md flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Nuevo Paciente
            </a>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Paciente</th>
                            <th class="p-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Correo Electrónico</th>
                            <th class="p-5 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($pacientes as $p)
                        <tr class="hover:bg-green-50/50 transition">
                            <td class="p-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 text-green-700 rounded-full flex items-center justify-center font-bold text-xs">
                                        {{ substr($p->user->nombre, 0, 2) }}
                                    </div>
                                    <span class="text-gray-700 font-bold">{{ $p->user->nombre }}</span>
                                </div>
                            </td>
                            <td class="p-5 text-gray-500 font-medium">{{ $p->user->correo }}</td>
                            <td class="p-5">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('pacientes.show', $p->usuario_id) }}" class="p-2 bg-blue-50 text-green-600 rounded-lg hover:bg-blue-100 transition" title="Editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('pacientes.destroy', $p->usuario_id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($pacientes->isEmpty())
                <div class="p-20 text-center">
                    <i class="fa-solid fa-users text-gray-200 text-6xl mb-4"></i>
                    <p class="text-gray-400 italic">Aún no tienes pacientes registrados.</p>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>