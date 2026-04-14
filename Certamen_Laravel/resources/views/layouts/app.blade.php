<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Gestor de Recetas Chilenas')</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-50">
        <!-- Navegación -->
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('recetas.index') }}" class="flex items-center gap-3">
                            <h1 class="text-2xl font-bold text-blue-600">RecetasChilenas</h1>
                        </a>
                    </div>

                    <!-- Navegación: Tipos de comida -->
                    <div class="hidden md:flex gap-2">
                        <a href="{{ route('recetas.index') }}" class="px-4 py-2 rounded-lg transition duration-300 text-gray-700 hover:bg-gray-100">
                            Todas
                        </a>
                        <a href="{{ route('recetas.index', ['tipo' => 'Entrada']) }}" class="px-4 py-2 rounded-lg transition duration-300 text-gray-700 hover:bg-gray-100">
                            Entradas
                        </a>
                        <a href="{{ route('recetas.index', ['tipo' => 'Plato Principal']) }}" class="px-4 py-2 rounded-lg transition duration-300 text-gray-700 hover:bg-gray-100">
                            Platos
                        </a>
                        <a href="{{ route('recetas.index', ['tipo' => 'Postre']) }}" class="px-4 py-2 rounded-lg transition duration-300 text-gray-700 hover:bg-gray-100">
                            Postres
                        </a>
                    </div>

                    <!-- Botón crear receta -->
                    <div class="flex items-center gap-4">
                        <a href="{{ route('recetas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            Nueva Receta
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Buscador principal -->
        <div class="bg-blue-600 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Busca tus recetas favoritas</h2>
                </div>
                <form action="{{ route('recetas.buscar') }}" method="GET" class="flex gap-2 max-w-2xl mx-auto">
                    <input 
                        type="text" 
                        name="buscar" 
                        placeholder="Buscar por nombre, ingrediente..." 
                        value="{{ request('buscar', '') }}"
                        class="flex-1 px-6 py-3 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 text-gray-700"
                    >
                    <button 
                        type="submit"
                        class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-3 px-6 rounded-lg transition"
                    >
                        Buscar
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenido principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
                    <p class="font-bold">Exito</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Pie de página -->
        <footer class="bg-gray-900 text-gray-300 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <!-- Sobre -->
                    <div>
                        <h3 class="text-white font-bold text-lg mb-4">
                            RecetasChilenas
                        </h3>
                        <p class="text-gray-400">
                            Descubre y comparte las mejores recetas de la cocina chilena tradicional.
                        </p>
                    </div>

                    <!-- Enlaces -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Categorías</h4>
                        <ul class="space-y-2">
                            <li><a href="{{ route('recetas.index', ['tipo' => 'Entrada']) }}" class="hover:text-white transition">Entradas</a></li>
                            <li><a href="{{ route('recetas.index', ['tipo' => 'Plato Principal']) }}" class="hover:text-white transition">Platos Principales</a></li>
                            <li><a href="{{ route('recetas.index', ['tipo' => 'Postre']) }}" class="hover:text-white transition">Postres</a></li>
                        </ul>
                    </div>

                    <!-- Enlaces útiles -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Enlaces</h4>
                        <ul class="space-y-2">
                            <li><a href="{{ route('recetas.index') }}" class="hover:text-white transition">Inicio</a></li>
                            <li><a href="{{ route('recetas.create') }}" class="hover:text-white transition">Crear Receta</a></li>
                            <li><a href="{{ route('recetas.index') }}" class="hover:text-white transition">Ver Todas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 RecetasChilenas. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
