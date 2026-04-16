<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pacientes</title>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen">
        <div class="w-64 bg-green-800 text-white p-6 hidden md:block shadow-xl">
            <h2 class="text-2xl font-bold mb-8 italic">NutriTrack</h2>
            <nav class="space-y-4">
                <a href="{{ route('perfil') }}" class="block py-2.5 px-4 rounded hover:bg-green-700">Mi Perfil</a>
                <a href="{{ route('pacientes.index')}}" class="block py-2.5 px-4 rounded bg-green-700">Mis Pacientes</a>
                <form action="{{ route('logout') }}" method="POST" class="mt-10">
                    @csrf
                    <button type="submit" class="w-full text-left py-2.5 px-4 rounded hover:bg-red-600 transition">Cerrar Sesión</button>
                </form>
            </nav>
        </div>

        <div class="flex-1 p-10">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-800">Panel de Pacientes</h1>
                <a href="{{ route('pacientes.create') }} " class="bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 shadow-lg transition transform hover:scale-105">
                    + Nuevo Paciente
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-5 text-sm font-bold text-gray-600 uppercase">Nombre</th>
                            <th class="p-5 text-sm font-bold text-gray-600 uppercase">Correo</th>
                            <th class="p-5 text-sm font-bold text-gray-600 uppercase text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($pacientes as $p)
                        <tr class="hover:bg-green-50/50 transition">
                            <td class="p-5 text-gray-700 font-medium">{{ $p->user->nombre }}</td>
                            <td class="p-5 text-gray-500">{{ $p->user->correo }}</td>
                            <td class="p-5 flex justify-center gap-3">
                                <a href="{{ route('pacientes.edit', $p->usuario_id) }}" class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-bold hover:bg-blue-200 transition">Editar</a>
                                <form action="{{ route('pacientes.destroy', $p->usuario_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-100 text-red-600 px-4 py-2 rounded-lg font-bold hover:bg-red-200 transition">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>