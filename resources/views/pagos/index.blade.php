<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden font-sans">

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center px-8">
            <h2 class="text-lg font-bold text-gray-800">Mi Plan de Suscripción</h2>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8">
            
            <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <span class="bg-white/20 text-[10px] font-black uppercase px-3 py-1 rounded-full backdrop-blur-md">Plan Actual</span>
                    <h3 class="text-4xl font-black mt-4">NutriTrack <span class="text-green-300 italic">Premium</span></h3>
                    <p class="mt-2 text-green-100 font-medium">Próximo pago: 15 de Mayo, 2026</p>
                    <div class="mt-6 flex space-x-4">
                        <button class="bg-white text-green-700 px-6 py-2 rounded-xl font-bold text-sm hover:bg-green-50 transition">Cambiar de Plan</button>
                        <button class="text-white/80 text-sm font-medium hover:text-white transition">Cancelar suscripción</button>
                    </div>
                </div>
                <i class="fa-solid fa-gem absolute -right-10 -bottom-10 text-[200px] text-white/10 rotate-12"></i>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:border-green-500 transition-all group">
                    <h4 class="font-bold text-gray-400 uppercase text-xs">Básico</h4>
                    <p class="text-2xl font-black text-gray-800 mt-2">$299<span class="text-xs font-normal">/mes</span></p>
                    <ul class="mt-6 space-y-4 text-sm text-gray-500">
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Hasta 10 pacientes</li>
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Agenda básica</li>
                        <li class="line-through opacity-50"><i class="fa-solid fa-xmark text-red-400 mr-2"></i> Reportes avanzados</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-3xl border-2 border-green-500 shadow-lg relative transform scale-105">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-green-500 text-white text-[10px] font-black px-4 py-1 rounded-full uppercase">Más Popular</span>
                    <h4 class="font-bold text-green-600 uppercase text-xs">Premium</h4>
                    <p class="text-2xl font-black text-gray-800 mt-2">$599<span class="text-xs font-normal">/mes</span></p>
                    <ul class="mt-6 space-y-4 text-sm text-gray-600">
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Pacientes ilimitados</li>
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Planificador Inteligente</li>
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Soporte Prioritario</li>
                    </ul>
                    <button class="w-full mt-8 bg-green-600 text-white py-3 rounded-2xl font-bold shadow-md opacity-50 cursor-not-allowed">Plan Activo</button>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:border-green-500 transition-all">
                    <h4 class="font-bold text-gray-400 uppercase text-xs">Empresarial</h4>
                    <p class="text-2xl font-black text-gray-800 mt-2">$999<span class="text-xs font-normal">/mes</span></p>
                    <ul class="mt-6 space-y-4 text-sm text-gray-500">
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Multiclínicas</li>
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> API personalizada</li>
                        <li><i class="fa-solid fa-check text-green-500 mr-2"></i> Facturación masiva</li>
                    </ul>
                    <button class="w-full mt-8 border-2 border-green-600 text-green-600 py-3 rounded-2xl font-bold hover:bg-green-50 transition">Contactar Ventas</button>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm">
                <div class="p-6 border-b border-gray-50">
                    <h3 class="font-bold text-gray-800">Recibos Recientes</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
                            <div>
                                <p class="font-bold text-gray-700">Factura Abril 2026</p>
                                <p class="text-[10px] text-gray-400">Pagado el 15/04/2026</p>
                            </div>
                        </div>
                        <span class="font-black text-gray-800">$599.00</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>