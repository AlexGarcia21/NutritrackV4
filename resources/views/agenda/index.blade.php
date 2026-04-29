<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - NutriTrack</title>
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
                <i class="fa-solid fa-house"></i> <span>Inicio</span>
            </a>
            <a href="{{ route('agenda') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-calendar-days"></i> <span>Agenda</span>
            </a>
            <a href="{{ route('pacientes.index') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-hospital-user"></i> <span>Pacientes</span>
            </a>
            <a href="{{ route('planificador') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-utensils"></i> <span>Planes de Dieta</span>
            </a>
            <a href="{{ route('perfil') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-user-doctor"></i> <span>Mi Perfil</span>
            </a>
        </nav>
        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 p-3 rounded-xl text-red-500 hover:bg-red-50 transition font-semibold">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
            <h2 class="text-lg font-semibold text-gray-800 italic">Gestión de Citas</h2>
            <div class="flex items-center space-x-4">
                <div class="relative flex bg-gray-100 rounded-xl p-1 w-48 h-10">
                    <div id="switch-bg" class="absolute top-1 left-1 bg-white shadow-sm rounded-lg w-[48%] h-8 transition-all duration-300 ease-in-out"></div>
                    <button onclick="toggleView('semana')" class="relative z-10 flex-1 text-sm font-bold text-gray-800">Semana</button>
                    <button onclick="toggleView('dia')" class="relative z-10 flex-1 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Día</button>
                </div>
                <button onclick="openModal()" class="bg-green-600 text-white px-5 py-2 rounded-xl font-bold text-sm hover:bg-green-700 shadow-md transition transform hover:scale-105">
                    <i class="fa-solid fa-plus mr-2"></i>Nueva Cita
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full min-h-[600px]">
                
                <div id="vista-semana" class="flex flex-col h-full bg-white">
                    <div class="grid grid-cols-7 border-b border-gray-100 bg-gray-50/50 text-center">
                        @foreach(['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'] as $dia)
                            <div class="p-3 border-r border-gray-100 last:border-r-0 font-black text-gray-400 uppercase text-[10px]">{{ $dia }}</div>
                        @endforeach
                    </div>
                    <div class="flex-1 grid grid-cols-7 divide-x divide-gray-100">
                        @for($i = 1; $i <= 7; $i++)
                            <div class="p-2 space-y-2 bg-gray-50/10 overflow-y-auto min-h-[400px]">
                                @foreach($citas as $cita)
                                    {{-- 
                                        Carbon::format('N') devuelve: 1 (Lunes) hasta 7 (Domingo).
                                        Si coincide con nuestro ciclo $i, la dibujamos aquí.
                                    --}}
                                    @if(\Carbon\Carbon::parse($cita->fecha_hora)->format('N') == $i)
                                        <div class="p-2 rounded-xl border-l-4 {{ $cita->estado == 'Completada' ? 'bg-gray-100 border-gray-400' : 'bg-green-50 border-green-500 shadow-sm' }} mb-2 transition hover:scale-105">
                                            <p class="text-[8px] font-black text-gray-800">{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i') }}</p>
                                            <p class="text-[9px] font-bold text-gray-600 truncate">{{ $cita->paciente->user->nombre }}</p>
                                            <p class="text-[7px] text-gray-400 italic truncate">{{ $cita->motivo }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endfor
                    </div>
                </div>

                <div id="vista-dia" class="hidden flex-col h-full bg-white overflow-y-auto p-8 space-y-6">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest italic border-b pb-4">Gestionar citas</h3>
                    
                    @forelse($citas as $cita)
                    <div class="group flex items-center justify-between p-6 rounded-3xl border transition-all duration-300 {{ $cita->estado == 'Completada' ? 'bg-gray-50 border-gray-100 opacity-60' : 'bg-white border-gray-200 shadow-sm hover:border-green-500' }}">
                        <div class="flex items-center space-x-6">
                            <div class="text-center bg-gray-100 px-4 py-2 rounded-2xl group-hover:bg-green-50 transition">
                                <p class="text-xl font-black text-gray-800">{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i') }}</p>
                                <p class="text-[10px] font-bold text-green-600 uppercase">{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('A') }}</p>
                            </div>
                            
                            <div>
                                <div class="flex items-center space-x-3">
                                    <p class="font-bold text-gray-900 text-lg">{{ $cita->paciente->user->nombre }}</p>
                                    <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase {{ $cita->estado == 'Pendiente' ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600' }}">
                                        {{ $cita->estado }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 font-medium mt-1">
                                    <i class="fa-solid fa-comment-medical mr-1 text-gray-300"></i>
                                    {{ $cita->motivo ?? 'Sin motivo registrado' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            {{-- BOTÓN PARA CAMBIAR ESTADO DINÁMICAMENTE --}}
                            @if($cita->estado != 'Completada')
                            <form action="{{ route('citas.update', $cita->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-green-700 shadow-md transition flex items-center">
                                    <i class="fa-solid fa-check-double mr-2"></i> Atendido
                                </button>
                            </form>
                            @endif

                            <a href="https://wa.me/{{ $cita->paciente->telefono }}" target="_blank" class="p-3 bg-green-50 text-green-600 rounded-xl hover:bg-green-600 hover:text-white transition shadow-sm">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                        <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                            <i class="fa-solid fa-calendar-xmark text-4xl text-gray-200 mb-4"></i>
                            <p class="text-gray-400 font-bold uppercase text-xs">No hay citas registradas</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

    <div id="citaModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-green-50">
                <h3 class="text-xl font-bold text-green-800 italic">Nueva Cita</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            <form action="{{ route('citas.store') }}" method="POST" class="p-8 space-y-4">
                @csrf
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase ml-1 tracking-widest">Paciente</label>
                    <select name="paciente_id" required class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none text-sm">
                        @foreach(\App\Models\Paciente::with('user')->where('nutriologo_id', Auth::id())->get() as $p)
                            <option value="{{ $p->usuario_id }}">{{ $p->user->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase ml-1 tracking-widest">Fecha</label>
                        <input type="date" name="fecha" required class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 text-sm">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase ml-1 tracking-widest">Hora</label>
                        <input type="time" name="hora" required class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 text-sm">
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase ml-1 tracking-widest">Motivo</label>
                    <textarea name="motivo" rows="2" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 text-sm" placeholder="Ej. Control de peso"></textarea>
                </div>
                <input type="hidden" name="estado" value="Pendiente">
                <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-green-700 transition">Confirmar Cita</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById('citaModal').classList.remove('hidden'); }
        function closeModal() { document.getElementById('citaModal').classList.add('hidden'); }

        function toggleView(view) {
            const bg = document.getElementById('switch-bg');
            const semana = document.getElementById('vista-semana');
            const dia = document.getElementById('vista-dia');

            if (view === 'dia') {
                bg.style.left = '48%';
                semana.classList.add('hidden');
                dia.classList.remove('hidden');
            } else {
                bg.style.left = '4px';
                semana.classList.remove('hidden');
                dia.classList.add('hidden');
            }
        }
    </script>
</body>
</html>