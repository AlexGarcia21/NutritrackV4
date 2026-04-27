<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NutriTrack</title>
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
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
            <a href="{{ route ('agenda') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
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
            <h2 class="text-lg font-semibold text-gray-800">Resumen General</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500 italic">Cédula: {{ $nutriologo->cedulaProfesional }}</span>
                
                <div class="flex items-center space-x-3 ml-4 border-l pl-4 border-gray-100">
                    <span class="text-sm font-bold text-gray-700">{{ $nutriologo->user->nombre }}</span>
                    
                    @if($nutriologo->foto_url)
                        <img src="{{ $nutriologo->foto_url }}" class="w-10 h-10 rounded-full border border-green-200 object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold border border-green-200 shadow-sm">
                            {{ substr($nutriologo->user->nombre, 0, 1) }}{{ substr(strrchr($nutriologo->user->nombre, " "), 1, 1) }}
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">Pacientes Activos</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">42</h3>
                    <span class="text-xs text-green-600 font-bold">+12% este mes</span>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">Citas Hoy</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">8</h3>
                    <span class="text-xs text-blue-600 font-bold">2 virtuales</span>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm font-medium">Ingresos Estimados</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">$12,400</h3>
                    <span class="text-xs text-gray-400 font-medium">Periodo actual</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                        <h4 class="font-bold text-gray-800">Próximas Citas</h4>
                        <button class="text-green-600 text-sm font-bold hover:underline">Ver todas</button>
                    </div>
                    <div class="divide-y divide-gray-50">
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 font-bold">JD</div>
                                <div><p class="text-sm font-bold text-gray-800">Juan Delgado</p><p class="text-xs text-gray-500 italic">Control de Diabetes - 10:30 AM</p></div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full uppercase">Confirmado</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-600 to-green-800 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="relative z-10">
                        <h4 class="text-2xl font-bold mb-2">Estado de Cuenta</h4>
                        <p class="text-green-100 mb-6 max-w-xs">Tu cédula profesional ha sido verificada. Tienes acceso total.</p>
                        <a href="{{ route('pagos') }}" class="inline-block">
                            <button class="bg-white text-green-700 px-8 py-3 rounded-3xl font-bold hover:bg-gray-50 transition shadow-lg">
                                Gestionar Pago
                            </button>
                        </a>
                    </div>
                    <i class="fa-solid fa-certificate absolute -bottom-10 -right-10 text-9xl text-white opacity-10 rotate-12"></i>
                </div>
            </div>
        </div>
    </main>
</body>
</html>