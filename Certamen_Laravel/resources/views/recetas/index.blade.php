@extends('layouts.app')

@section('title', 'Mis Recetas - RecetasChilenas')

@section('content')
<div>
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-bold text-gray-800 mb-2">🍳 Mis Recetas</h1>
        <p class="text-gray-600 text-lg">Explora y gestiona tus recetas favoritas</p>
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
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-purple-500"
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
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-purple-500"
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
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-purple-500"
                    >
                </div>
            </div>

            <div class="flex gap-2 justify-end flex-wrap">
                <button 
                    type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition"
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
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl shadow-lg p-6 mb-8 text-white">
        <p class="text-lg font-bold">📊 Mostrando <strong>{{ count($recetas) }}</strong> receta(s)</p>
    </div>

    <!-- Grid de recetas usando @foreach y parcial -->
    @if(count($recetas) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recetas as $receta)
                @include('recetas.partials.receta-card', ['receta' => $receta])
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <p class="text-2xl text-gray-600 mb-4">😢 No se encontraron recetas</p>
            <p class="text-gray-500 mb-6">Intenta ajustar los filtros o crear una nueva receta</p>
            <a href="{{ route('recetas.index') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition mr-3">
                ↻ Limpiar filtros
            </a>
            <a href="{{ route('recetas.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition">
                + Crear Receta
            </a>
        </div>
    @endif
</div>

@endsection
