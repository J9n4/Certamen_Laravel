@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-pink-50 to-red-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-bold">✓ Éxito</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <p class="font-bold">✕ Error</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-5xl font-bold text-gray-800 mb-2">🍳 Mis Recetas</h1>
            <p class="text-gray-600 text-lg">Explora y gestiona tus recetas favoritas</p>
        </div>

        <!-- Barra de búsqueda y botón crear -->
        <div class="flex gap-4 mb-8 flex-col sm:flex-row">
            <form action="{{ route('recetas.buscar') }}" method="GET" class="flex-1">
                <div class="flex gap-2">
                    <input 
                        type="text" 
                        name="buscar" 
                        placeholder="🔍 Buscar recetas..."
                        class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 shadow-md"
                    >
                    <button 
                        type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 shadow-md"
                    >
                        Buscar
                    </button>
                </div>
            </form>
            <a href="{{ route('recetas.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 shadow-md text-center">
                + Crear Receta
            </a>
        </div>

        <!-- Panel de Filtros -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">🎯 Filtros</h2>
            
            <form action="{{ route('recetas.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <!-- Filtro Tipo -->
                    <div>
                        <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">Tipo de Comida</label>
                        <select 
                            id="tipo" 
                            name="tipo"
                            class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                        >
                            <option value="">-- Todas --</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ $filtros['tipo'] === $tipo ? 'selected' : '' }}>
                                    {{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro Dificultad -->
                    <div>
                        <label for="dificultad" class="block text-sm font-bold text-gray-700 mb-2">Dificultad</label>
                        <select 
                            id="dificultad" 
                            name="dificultad"
                            class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                        >
                            <option value="">-- Todas --</option>
                            @foreach($dificultades as $dificultad)
                                <option value="{{ $dificultad }}" {{ $filtros['dificultad'] === $dificultad ? 'selected' : '' }}>
                                    {{ $dificultad }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Búsqueda por nombre -->
                    <div>
                        <label for="buscar_filter" class="block text-sm font-bold text-gray-700 mb-2">Por Nombre</label>
                        <input 
                            type="text" 
                            id="buscar_filter" 
                            name="buscar" 
                            value="{{ $filtros['buscar'] }}"
                            placeholder="Buscar..."
                            class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                        >
                    </div>
                </div>

                <div class="flex gap-2 justify-end flex-wrap">
                    <button 
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition"
                    >
                        ✓ Aplicar Filtros
                    </button>
                    <a 
                        href="{{ route('recetas.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-6 rounded-lg transition text-center"
                    >
                        ↻ Limpiar
                    </a>
                </div>
            </form>
        </div>

        <!-- Estadísticas -->
        <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl shadow-lg p-6 mb-8 text-white">
            <p class="text-lg font-bold">📊 Mostrando <strong>{{ count($recetas) }}</strong> receta(s)</p>
        </div>

        <!-- Grid de recetas -->
        @if(count($recetas) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recetas as $receta)
            <a href="{{ route('recetas.show', ['id' => $receta['id']]) }}" class="group">
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 cursor-pointer h-full overflow-hidden flex flex-col">
                    <!-- Imagen -->
                    @if(isset($receta['imagen_url']))
                        <div class="w-full h-40 overflow-hidden bg-gray-200">
                            <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                    @endif

                    <!-- Header con badges -->
                    <div class="p-4 bg-gradient-to-r from-orange-400 to-red-400 flex justify-between items-center">
                        <span class="bg-white bg-opacity-90 text-orange-600 px-3 py-1 rounded-full text-xs font-bold">
                            {{ $receta['tipo'] }}
                        </span>
                        <span class="
                            px-3 py-1 rounded-full text-xs font-bold text-white
                            {{ $receta['dificultad'] === 'Fácil' ? 'bg-green-500' : '' }}
                            {{ $receta['dificultad'] === 'Media' ? 'bg-yellow-500' : '' }}
                            {{ $receta['dificultad'] === 'Difícil' ? 'bg-red-600' : '' }}
                        ">
                            {{ $receta['dificultad'] }}
                        </span>
                    </div>

                    <!-- Contenido -->
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-600 transition line-clamp-2">
                            {{ $receta['nombre'] }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 h-10">
                            {{ $receta['descripcion'] }}
                        </p>

                        <!-- Info -->
                        <div class="flex items-center justify-between text-sm text-gray-500 border-t pt-3 mt-auto">
                            <span class="flex items-center gap-1">⏱️ {{ $receta['tiempo'] }} min</span>
                            <span class="flex items-center gap-1">📝 {{ count($receta['ingredientes']) }} ing.</span>
                        </div>
                    </div>

                    <!-- Action -->
                    <div class="px-5 pb-4">
                        <div class="text-orange-500 font-bold group-hover:translate-x-1 transition">
                            Ver detalles →
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <p class="text-2xl text-gray-600 mb-4">😢 No se encontraron recetas</p>
            <p class="text-gray-500 mb-6">Intenta ajustar los filtros o crear una nueva receta</p>
            <a href="{{ route('recetas.index') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-lg transition mr-3">
                ↻ Limpiar filtros
            </a>
            <a href="{{ route('recetas.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition">
                + Crear Receta
            </a>
        </div>
        @endif
    </div>
</div>

<style>
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
