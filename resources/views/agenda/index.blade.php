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
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
            <a href="{{ route ('agenda') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Agenda</span>
            </a>
            <a href="{{ route('pacientes.index') }}" class="flex items-center space-x-3 p-3 rounded-xl  text-gray-600 hover:bg-gray-50 transition">
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
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
            <h2 class="text-lg font-semibold text-gray-800">Mi Agenda Semanal</h2>
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
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
                
               <div id="vista-semana" class="flex flex-col h-full transition-all duration-500">
                    <div class="grid grid-cols-7 border-b border-gray-100 bg-gray-50/50">
                        @php $dias = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom']; @endphp
                        @foreach($dias as $dia)
                        <div class="p-4 text-center border-r border-gray-100 last:border-r-0">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $dia }}</p>
                        </div>
                        @endforeach
                    </div>

                    <div class="flex-1 grid grid-cols-7 relative h-[600px] bg-white">
                        @for($i = 0; $i < 7; $i++)
                        <div class="border-r border-gray-100 last:border-r-0 h-full bg-stripes">
                            <div class="h-full w-full opacity-20 bg-[linear-gradient(rgba(0,0,0,0.05)_1px,transparent_1px)] bg-[size:100%_50px]"></div>
                        </div>
                        @endfor

                        <div class="absolute top-10 left-[14.28%] w-[14.28%] p-2">
                            <div class="bg-green-100 border-l-4 border-green-600 p-3 rounded-xl shadow-sm transform transition hover:scale-105 cursor-pointer">
                                <p class="text-[9px] font-bold text-green-700 uppercase">10:00 AM</p>
                                <p class="text-xs font-bold text-gray-800 truncate">Iker Saucedo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="vista-dia" class="hidden flex-col h-full transition-all duration-500">
                    <div class="p-4 text-center border-b border-gray-100 bg-green-50">
                        <p class="text-xs font-black text-green-700 uppercase tracking-widest">Hoy - Lunes 4 de Mayo</p>
                    </div>
                    <div class="flex-1 relative bg-white p-6">
                        <div class="space-y-8">
                            @foreach(['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM'] as $hora)
                            <div class="flex items-center space-x-4 border-b border-gray-50 pb-2">
                                <span class="text-[10px] font-bold text-gray-300 w-16">{{ $hora }}</span>
                                <div class="flex-1 h-12 rounded-xl border border-dashed border-gray-100 hover:bg-gray-50 transition"></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="absolute top-24 left-24 right-10 bg-green-100 border-l-4 border-green-600 p-4 rounded-xl shadow-md">
                            <p class="text-xs font-black text-green-700 uppercase">10:00 AM - 11:00 AM</p>
                            <p class="font-bold text-gray-800">Iker Saucedo</p>
                            <p class="text-xs text-gray-500">Consulta de seguimiento inicial</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="citaModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-green-50">
                <h3 class="text-xl font-bold text-green-800">Programar Nueva Cita</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            <form action="#" class="p-8 space-y-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Seleccionar Paciente</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none transition">
                        <option>Juan Delgado</option>
                        <option>María Arreola</option>
                        <option>+ Registrar nuevo paciente</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase ml-1">Fecha</label>
                        <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase ml-1">Hora</label>
                        <input type="time" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Tipo de Consulta</label>
                    <select name="tipo" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none transition">
                        <option value="presencial">Presencial</option>
                        <option value="virtual">Virtual / Online</option>
                    </select>
                </div>
                
                <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-green-700 transition transform hover:scale-[1.02] mt-4">
                    Confirmar Cita
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById('citaModal').classList.remove('hidden'); }
        function closeModal() { document.getElementById('citaModal').classList.add('hidden'); }

        //funcion para el cambio de semana a día
        function toggleView(view) {
            const bg = document.getElementById('switch-bg');
            const semana = document.getElementById('vista-semana');
            const dia = document.getElementById('vista-dia');

            if (view === 'dia') {
                bg.style.left = '48%'; // Ajusta según tu diseño
                semana.classList.add('hidden');
                dia.classList.remove('hidden');
            } else {
                bg.style.left = '4px';
                semana.classList.remove('hidden'); // <-- Esto hace que vuelva a aparecer
                dia.classList.add('hidden');
            }
        }
    </script>
</body>
</html>