@extends('layouts.app')

@section('title', 'Resultados de Búsqueda - RecetasChilenas')

@section('content')
<div>
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Resultados: "<span class="text-purple-600">{{ $query }}</span>"
        </h1>
        
        <form action="{{ route('recetas.buscar') }}" method="GET" class="mb-4">
            <div class="flex gap-2">
                <input type="text" name="buscar" value="{{ $query }}" placeholder="Buscar recetas..." class="flex-1 px-4 py-2 border-2 border-gray-300 rounded-lg">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition">Buscar</button>
            </div>
        </form>

        @if(count($resultados) == 0)
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg">No se encontraron recetas con "<strong>{{ $query }}</strong>"</p>
                <a href="{{ route('recetas.index') }}" class="inline-block mt-4 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition">← Volver a todas</a>
            </div>
        @else
            <p class="text-gray-600">Se encontraron <strong>{{ count($resultados) }}</strong> receta(s)</p>
        @endif
    </div>

    <!-- Grid de recetas -->
    @if(count($resultados) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($resultados as $receta)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all">
                <div class="h-48 bg-gradient-to-br from-purple-200 to-pink-200 overflow-hidden">
                    @if(isset($receta['imagen_url']))
                        <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-6xl">🍽️</div>
                    @endif
                    <div class="absolute top-3 left-3 bg-white px-3 py-1 rounded-full text-xs font-bold text-purple-600">
                        {{ $receta['tipo'] }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $receta['nombre'] }}</h3>
                    <div class="flex justify-between items-center mb-4">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold @if($receta['dificultad'] === 'Fácil') bg-green-100 text-green-700 @elseif($receta['dificultad'] === 'Media') bg-yellow-100 text-yellow-700 @else bg-red-100 text-red-700 @endif">
                            {{ $receta['dificultad'] }}
                        </span>
                        <span class="text-sm text-gray-700 font-semibold">⏱️ {{ $receta['tiempo'] }} min</span>
                    </div>
                    <a href="{{ route('recetas.show', $receta['id']) }}" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition block text-center">Ver receta</a>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

@endsection
