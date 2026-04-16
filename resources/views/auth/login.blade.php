<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - NutriTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-6">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border-t-8 border-green-600">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-green-700 italic">NutriTrack</h1>
            <p class="text-gray-500 mt-2">Bienvenido de nuevo, Especialista</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wide">Correo Electrónico</label>
                <input type="email" name="correo" class="w-full mt-2 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" placeholder="ejemplo@nutripro.com" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wide">Contraseña</label>
                <input type="password" name="contrasena" class="w-full mt-2 p-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition" placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition duration-300 shadow-lg transform hover:-translate-y-1">
                Iniciar Sesión
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
            <p class="text-gray-600">¿Aún no tienes una cuenta?</p>
            <a href="{{ route('register') }}" class="inline-block mt-2 text-green-600 font-bold hover:text-green-800 transition underline decoration-2 underline-offset-4">
                Regístrate como Nutriólogo aquí
            </a>
        </div>
    </div>
</body>
</html>