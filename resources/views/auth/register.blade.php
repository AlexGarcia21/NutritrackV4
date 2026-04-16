<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-200 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">
        <div class="md:w-1/3 bg-green-600 p-10 text-white flex flex-col justify-center">
            <h2 class="text-3xl font-bold mb-4">¡Únete a NutriTrack!</h2>
            <p class="text-blue-100">Crea tu perfil profesional y comienza a gestionar las dietas de tus pacientes de forma eficiente.</p>
        </div>

        <div class="md:w-2/3 p-10">
            <form action="{{ route('register') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-600">Nombre Completo</label>
                    <input type="text" name="nombre" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600">Correo Electrónico</label>
                    <input type="email" name="correo" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600">Contraseña</label>
                    <input type="password" name="password" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600">Cédula Profesional</label>
                    <input type="text" name="cedula" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600">Especialidad</label>
                    <input type="text" name="especialidad" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition" required>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-600">URL de Foto de Perfil</label>
                    <input type="url" name="foto_url" placeholder="https://imagen.com/foto.jpg" class="w-full mt-1 p-2 border-b-2 border-gray-300 focus:border-green-500 outline-none transition">
                </div>

                <div class="col-span-2 mt-6">
                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition shadow-lg">
                        Finalizar Registro
                    </button>
                </div>

                <div class="col-span-2 mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        ¿Ya tienes una cuenta profesional? 
                        <a href="{{ route('login') }}" class="text-green-600 font-bold hover:underline ml-1">
                            Inicia sesión aquí
                        </a>
                    </p>
               </div>
            </form>
        </div>
    </div>
</body>
</html>