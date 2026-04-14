@extends('layouts.app')

@section('title', 'Mis Recetas - RecetasChilenas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Mis Recetas</h1>
        <p class="text-gray-600 text-lg">Explora y gestiona tus recetas favoritas</p>
    </div>

    <!-- Panel de Filtros -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Filtros</h2>
        
        <form action="{{ route('recetas.index') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <!-- Filtro Tipo -->
                <div>
                    <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">Tipo de Comida</label>
                    <select id="tipo" name="tipo" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg">
                        <option value="">-- Todas --</option>
                        <option value="Entrada" {{ $filtros['tipo'] === 'Entrada' ? 'selected' : '' }}>Entrada</option>
                        <option value="Plato Principal" {{ $filtros['tipo'] === 'Plato Principal' ? 'selected' : '' }}>Plato Principal</option>
                        <option value="Postre" {{ $filtros['tipo'] === 'Postre' ? 'selected' : '' }}>Postre</option>
                    </select>
                </div>

                <!-- Filtro Dificultad -->
                <div>
                    <label for="dificultad" class="block text-sm font-bold text-gray-700 mb-2">Dificultad</label>
                    <select id="dificultad" name="dificultad" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg">
                        <option value="">-- Todas --</option>
                        <option value="Fácil" {{ $filtros['dificultad'] === 'Fácil' ? 'selected' : '' }}>Fácil</option>
                        <option value="Media" {{ $filtros['dificultad'] === 'Media' ? 'selected' : '' }}>Media</option>
                        <option value="Difícil" {{ $filtros['dificultad'] === 'Difícil' ? 'selected' : '' }}>Difícil</option>
                    </select>
                </div>

                <!-- Búsqueda por nombre -->
                <div>
                    <label for="buscar_filter" class="block text-sm font-bold text-gray-700 mb-2">Por Nombre</label>
                    <input type="text" id="buscar_filter" name="buscar" value="{{ $filtros['buscar'] }}" placeholder="Buscar..." class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="flex gap-2 justify-end flex-wrap">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">Aplicar</button>
                <a href="{{ route('recetas.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-6 rounded-lg transition text-center">Limpiar</a>
            </div>
        </form>
    </div>

    <!-- Estadísticas -->
    <div class="bg-blue-600 rounded-lg shadow-lg p-6 mb-8 text-white">
        <p class="text-lg font-bold">Mostrando {{ count($recetas) }} receta(s)</p>
    </div>

    <!-- Grid de recetas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(count($recetas) > 0)
            @foreach($recetas as $receta)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all overflow-hidden">
                    <div class="h-48 bg-gray-200 overflow-hidden relative">
                        @if(isset($receta['imagen_url']))
                            <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">Sin imagen</div>
                        @endif
                        <div class="absolute top-3 left-3 bg-white px-3 py-1 rounded-full text-xs font-bold text-blue-600">
                            {{ $receta['tipo'] }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $receta['nombre'] }}</h3>
                        <div class="flex justify-between items-center mb-4">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold @if($receta['dificultad'] === 'Fácil') bg-green-100 text-green-700 @elseif($receta['dificultad'] === 'Media') bg-yellow-100 text-yellow-700 @else bg-red-100 text-red-700 @endif">
                                {{ $receta['dificultad'] }}
                            </span>
                            <span class="text-sm text-gray-700 font-semibold">{{ $receta['tiempo'] }} min</span>
                        </div>
                        <a href="{{ route('recetas.show', $receta['id']) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition block text-center">Ver receta</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-full bg-white rounded-xl shadow-lg p-12 text-center">
                <p class="text-2xl text-gray-600 mb-4">No se encontraron recetas</p>
                <a href="{{ route('recetas.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">Crear Receta</a>
            </div>
        @endif
    </div>

    <!-- Botón crear al final -->
    @if(count($recetas) > 0)
        <div class="mt-12 text-center">
            <a href="{{ route('recetas.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                Crear Receta
            </a>
        </div>
    @endif
</div>
@endsection
