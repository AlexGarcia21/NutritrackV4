<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente - {{ $paciente->user->nombre }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!--Liberia para gráfica de barras-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
            <div class="flex items-center space-x-4">
                <a href="{{ route('pacientes.index') }}" class="text-gray-400 hover:text-green-600"><i class="fa-solid fa-arrow-left"></i></a>
                <h2 class="text-lg font-semibold text-gray-800">Expediente Clínico: {{ $paciente->user->nombre }}</h2>
            </div>
            <button onclick="openModal()" class="bg-green-600 text-white px-5 py-2 rounded-xl font-bold text-sm hover:bg-green-700 shadow-md transition transform hover:scale-105">
                <i class="fa-solid fa-plus mr-2"></i>Nueva Cita
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <p class="text-xs font-bold text-gray-400 uppercase">Peso Actual</p>
                    <p class="text-2xl font-black text-gray-800">56.0 <span class="text-sm font-normal text-gray-400">kg</span></p>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <p class="text-xs font-bold text-gray-400 uppercase">IMC</p>
                    <p class="text-2xl font-black text-blue-600">23.3</p>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <p class="text-xs font-bold text-gray-400 uppercase">% Grasa</p>
                    <p class="text-2xl font-black text-orange-500">18%</p>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <p class="text-xs font-bold text-gray-400 uppercase">Masa Muscular</p>
                    <p class="text-2xl font-black text-green-600">10 kg</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fa-solid fa-user-tag mr-2 text-green-600"></i> Datos Generales
                        </h3>
                        <div class="space-y-3">
                            <div><p class="text-xs text-gray-400 font-bold uppercase">Edad</p><p class="text-sm text-gray-700">17 años</p></div>
                            <div><p class="text-xs text-gray-400 font-bold uppercase">Correo</p><p class="text-sm text-gray-700">{{ $paciente->user->correo }}</p></div>
                            <div><p class="text-xs text-gray-400 font-bold uppercase">Objetivo</p><p class="text-sm text-green-700 font-bold">Subir grasa y tonificación</p></div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-600 to-green-800 p-6 rounded-3xl text-white shadow-lg">
                        <h4 class="font-bold text-lg mb-2 text-center">Plan Alimenticio</h4>
                        <p class="text-xs text-green-100 mb-4 text-center">Actualmente en la semana 3 del Plan Keto Plus.</p>
                        <form action="{{ route('planificador') }}" method="GET">
                            <button type="submit" class="w-full bg-white text-green-700 py-3 rounded-xl font-bold hover:bg-green-50 transition">
                                <i class="fa-solid fa-utensils mr-2"></i>Ver Dieta Actual
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-gray-800 flex items-center">
                <i class="fa-solid fa-chart-line mr-2 text-green-600"></i> Curva de Progreso
            </h3>
            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Peso (kg) vs Tiempo</span>
        </div>
        <div class="h-64">
            <canvas id="progresoChart"></canvas>
        </div>
    </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                    <div>
                        <h3 class="font-bold text-gray-800">Historial de Mediciones</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Seguimiento Antropométrico</p>
                    </div>
                    <button onclick="openMetricaModal()" class="flex items-center space-x-2 bg-green-600 text-white px-4 py-2 rounded-xl font-bold text-xs hover:bg-green-700 transition shadow-md">
                        <i class="fa-solid fa-plus"></i>
                        <span>Registrar Avance</span>
                    </button>
                </div>
                    <div class="p-6">
                        <table class="w-full text-left">
                            <thead class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-50">
                                <tr>
                                    <th class="py-3">Fecha</th>
                                    <th class="py-3 text-center">Peso</th>
                                    <th class="py-3 text-center">Grasa %</th>
                                    <th class="py-3 text-right">IMC</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-600 divide-y divide-gray-50">
                                @foreach($paciente->metricas->sortByDesc('fecha') as $metrica)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 font-medium">{{ \Carbon\Carbon::parse($metrica->fecha)->format('d M Y') }}</td>
                                    <td class="py-4 text-center font-bold text-gray-800">{{ $metrica->peso }} kg</td>
                                    <td class="py-4 text-center text-orange-600 font-semibold">{{ $metrica->grasaCorporal }}%</td>
                                    <td class="py-4 text-right text-blue-600 font-bold">{{ $metrica->imc }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="metricaModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-green-50">
                <h3 class="font-bold text-green-800 text-sm italic">Registrar Nueva Métrica</h3>
                <button onclick="closeMetricaModal()" class="text-gray-400 hover:text-red-500"><i class="fa-solid fa-xmark"></i></button>
            </div>
            
            <form action="{{ route('metricas.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="paciente_id" value="{{ $paciente->usuario_id }}">
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Fecha de Toma</label>
                        <input type="date" name="fecha" value="{{ date('Y-m-d') }}" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Peso (kg)</label>
                        <input type="number" step="0.01" name="peso" placeholder="56.0" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">% Grasa Corporal</label>
                        <input type="number" step="0.1" name="grasa" placeholder="22.5" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">IMC (Calculado)</label>
                        <input type="number" step="0.01" name="imc" placeholder="22.4" class="w-full mt-1 p-3 bg-gray-100 border border-gray-100 rounded-xl text-sm outline-none" readonly>
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-2xl font-bold shadow-lg hover:bg-green-700 transition">
                    Guardar Progreso
                </button>
            </form>
        </div>
    </div>


    <div id="citaModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-green-50">
            <h3 class="text-xl font-bold text-green-800">Agendar Cita</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition"><i class="fa-solid fa-xmark text-xl"></i></button>
        </div>
        <form action="#" method="POST" class="p-8 space-y-4">
            @csrf
            <div>
                <label class="text-xs font-bold text-gray-400 uppercase ml-1">Paciente</label>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 border border-gray-100 rounded-xl mt-1">
                    <div class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center text-xs font-bold">
                        {{ substr($paciente->user->nombre, 0, 1) }}
                    </div>
                    <span class="text-sm font-bold text-gray-700">{{ $paciente->user->nombre }}</span>
                </div>
                <input type="hidden" name="paciente_id" value="{{ $paciente->usuario_id }}">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Fecha</label>
                    <input type="date" name="fecha" required class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none">
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Hora</label>
                    <input type="time" name="hora" required class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 mt-1 focus:ring-2 focus:ring-green-500 outline-none">
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
                    Confirmar Cita para {{ explode(' ', $paciente->user->nombre)[0] }}
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('citaModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('citaModal').classList.add('hidden');
        }

        // EXTRA: Cerrar el modal si se presiona la tecla Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") closeModal();
        });

        function openMetricaModal() { document.getElementById('metricaModal').classList.remove('hidden'); }
        function closeMetricaModal() { document.getElementById('metricaModal').classList.add('hidden'); }

        //gárica para ver el rpoceso del paciente con javascript
        document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('progresoChart').getContext('2d');
        
        // Obtenemos los datos pasados desde el controlador
        const etiquetas = @json($fechas->map(fn($f) => \Carbon\Carbon::parse($f)->format('d M')));
        const datosPeso = @json($historicoPeso);

        new Chart(ctx, {
            type: 'line', // 'line' se ve más profesional para progreso que barras
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Peso del Paciente',
                    data: datosPeso,
                    borderColor: '#16a34a', // Verde de NutriTrack
                    backgroundColor: 'rgba(22, 163, 74, 0.1)',
                    borderWidth: 3,
                    tension: 0.4, // Curva suave
                    fill: true,
                    pointBackgroundColor: '#16a34a',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: { display: false }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
    </script>
</body>
</html>