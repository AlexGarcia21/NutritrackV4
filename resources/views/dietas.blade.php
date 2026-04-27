<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificador de Dieta - NutriTrack</title>
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
            <a href="{{ route('agenda') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-calendar-days"></i> <span>Agenda</span>
            </a>
            <a href="{{ route('pacientes.index') }}" class="flex items-center space-x-3 p-3 rounded-xl text-gray-600 hover:bg-gray-50 transition">
                <i class="fa-solid fa-hospital-user"></i> <span>Pacientes</span>
            </a>
            <a href="{{ route('planificador') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-green-50 text-green-700 font-bold">
                <i class="fa-solid fa-utensils"></i> <span>Planes de Dieta</span>
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
            <h2 class="text-lg font-semibold text-gray-800">Planificador Inteligente</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500">Paciente: <strong class="text-gray-800">Iker Saucedo</strong></span>
                <button class="bg-green-600 text-white px-4 py-2 rounded-xl font-bold text-sm hover:bg-green-700 shadow-md">Guardar Plan</button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 tracking-tight">Gasto Energético (GET)</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="text-[10px] font-bold text-gray-400 uppercase">Fórmula de Cálculo</label>
                            <select class="w-full mt-1 p-2 bg-gray-50 border border-gray-100 rounded-lg text-sm outline-none">
                                <option>Harris-Benedict</option>
                                <option>Mifflin-St Jeor</option>
                            </select>
                        </div>
                        <div class="p-4 bg-green-50 rounded-2xl text-center">
                            <p class="text-xs text-green-700 font-bold uppercase">Meta Diaria</p>
                            <h4 class="text-3xl font-black text-green-800">4,000 <span class="text-sm font-normal">kcal</span></h4>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4 tracking-tight">Distribución de Macros</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="font-bold text-gray-600">Proteínas (30%)</span>
                                <span class="text-gray-400">120g / 180g</span>
                            </div>
                            <div class="w-full bg-gray-100 h-2 rounded-full">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="font-bold text-gray-600">Carbohidratos (40%)</span>
                                <span class="text-gray-400">200g / 245g</span>
                            </div>
                            <div class="w-full bg-gray-100 h-2 rounded-full">
                                <div class="bg-orange-500 h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                        <h3 class="font-bold text-gray-800">Menú Personalizado</h3>
                        <div class="flex space-x-2">
                            <button class="p-2 text-gray-400 hover:text-green-600"><i class="fa-solid fa-print"></i></button>
                            <button class="p-2 text-gray-400 hover:text-green-600"><i class="fa-solid fa-share-nodes"></i></button>
                        </div>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex items-center space-x-2 text-green-700 font-bold uppercase text-xs tracking-widest">
                            <i class="fa-solid fa-mug-saucer"></i>
                            <span>Desayuno (08:00 AM)</span>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <span class="text-xl">🍳</span>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800">Huevo con Espinacas</p>
                                        <p class="text-[10px] text-gray-500">2 piezas + 1 taza de espinaca</p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-400">180 kcal</span>
                            </div>
                            <button onclick="openAlimentoModal()" class="w-full py-2 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400 text-xs font-bold hover:bg-gray-50 transition">
                                + Agregar alimento o equivalente
                            </button>
                        </div>
                    </div>

                    <div class="p-6 bg-gray-50/50 space-y-4">
                        <div class="flex items-center space-x-2 text-orange-700 font-bold uppercase text-xs tracking-widest">
                            <i class="fa-solid fa-plate-wheat"></i>
                            <span>Comida (02:30 PM)</span>
                        </div>
                        <button onclick="openAlimentoModal()" class="w-full py-4 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400 text-xs font-bold hover:bg-gray-50 transition">
                            Haga clic para diseñar este tiempo de comida
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <div id="alimentoModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-sm rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-orange-50">
            <h3 class="font-bold text-orange-800 text-sm italic"><i class="fa-solid fa-apple-whole mr-2"></i>Nuevo Alimento</h3>
            <button onclick="closeAlimentoModal()" class="text-gray-400 hover:text-red-500 transition"><i class="fa-solid fa-xmark"></i></button>
        </div>
        
        <div class="p-6 space-y-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase">Nombre del Alimento</label>
                        <input type="text" placeholder="Ej. Avena con fruta" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none focus:ring-2 focus:ring-orange-400">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-[10px] font-bold text-gray-400 uppercase">Cantidad</label>
                            <input type="text" placeholder="1 taza" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold text-gray-400 uppercase">Calorías</label>
                            <input type="number" placeholder="0" class="w-full mt-1 p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm outline-none">
                        </div>
                    </div>

                    <button onclick="closeAlimentoModal()" class="w-full bg-orange-500 text-white py-3 rounded-2xl font-bold shadow-lg shadow-orange-100 hover:bg-orange-600 transition mt-2">
                        Agregar al Menú
                    </button>
                </div>
            </div>
        </div>

    <script>
    function openAlimentoModal() { document.getElementById('alimentoModal').classList.remove('hidden'); }
    function closeAlimentoModal() { document.getElementById('alimentoModal').classList.add('hidden'); }
    </script>
</body>
</html>