@extends('layouts.app')

@section('title', 'Resultados de Búsqueda - RecetasChilenas')

@section('content')
<div>
    <!-- Header con búsqueda -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Resultados de búsqueda: "<span class="text-purple-600">{{ $query }}</span>"
        </h1>
        
        <form action="{{ route('recetas.buscar') }}" method="GET" class="mb-4">
            <div class="flex gap-2">
                <input 
                    type="text" 
                    name="buscar" 
                    value="{{ $query }}"
                    placeholder="Buscar recetas..."
                    class="flex-1 px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-purple-500"
                >
                <button 
                    type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition"
                >
                    Buscar
                </button>
            </div>
        </form>

        @if(count($resultados) == 0)
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg">No se encontraron recetas con "<strong>{{ $query }}</strong>"</p>
                <p class="text-gray-500 mt-2">Intenta con otras palabras clave</p>
                <a href="{{ route('recetas.index') }}" class="inline-block mt-4 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    ← Volver a todas las recetas
                </a>
            </div>
        @else
            <p class="text-gray-600">Se encontraron <strong class="text-purple-600">{{ count($resultados) }}</strong> receta(s)</p>
        @endif
    </div>

    <!-- Grid de recetas usando @foreach y parcial -->
    @if(count($resultados) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($resultados as $receta)
                @include('recetas.partials.receta-card', ['receta' => $receta])
            @endforeach
        </div>
    @endif
</div>

@endsection
