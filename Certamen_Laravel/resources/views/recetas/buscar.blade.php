@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-pink-50 to-red-50 p-6">
    <div class="max-w-6xl mx-auto">
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

        <!-- Header con búsqueda -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                 Resultados de búsqueda: "<span class="text-orange-600">{{ $query }}</span>"
            </h1>
            
            <form action="{{ route('recetas.buscar') }}" method="GET" class="mb-4">
                <div class="flex gap-2">
                    <input 
                        type="text" 
                        name="buscar" 
                        value="{{ $query }}"
                        placeholder="Buscar recetas..."
                        class="flex-1 px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                    >
                    <button 
                        type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-lg transition"
                    >
                        Buscar
                    </button>
                </div>
            </form>

            @if(count($resultados) == 0)
                <div class="text-center py-8">
                    <p class="text-gray-600 text-lg">No se encontraron recetas con "<strong>{{ $query }}</strong>"</p>
                    <p class="text-gray-500 mt-2">Intenta con otras palabras clave</p>
                    <a href="{{ route('recetas.index') }}" class="inline-block mt-4 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-lg transition">
                        ← Volver a todas las recetas
                    </a>
                </div>
            @else
                <p class="text-gray-600">Se encontraron <strong class="text-orange-600">{{ count($resultados) }}</strong> receta(s)</p>
            @endif
        </div>

        <!-- Grid de recetas -->
        @if(count($resultados) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($resultados as $receta)
            <a href="{{ route('recetas.show', ['id' => $receta['id']]) }}" class="group">
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 cursor-pointer h-full overflow-hidden flex flex-col">
                    <!-- Imagen -->
                    @if(isset($receta['imagen_url']))
                        <div class="w-full h-40 overflow-hidden bg-gray-200">
                            <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                    @endif

                    <!-- Badge tipo y dificultad -->
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
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-1">
                            {{ $receta['descripcion'] }}
                        </p>

                        <!-- Info -->
                        <div class="flex items-center justify-between text-sm text-gray-500 border-t pt-3">
                            <span>⏱️ {{ $receta['tiempo'] }} min</span>
                            <span>📝 {{ count($receta['ingredientes']) }} ing.</span>
                        </div>
                    </div>

                    <!-- Arrow hover -->
                    <div class="px-5 pb-5">
                        <div class="text-orange-500 font-bold group-hover:translate-x-1 transition">
                            Ver más →
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        <!-- Botón volver -->
        <div class="mt-8 text-center">
            <a href="{{ route('recetas.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded-lg transition">
                ← Volver a todas las recetas
            </a>
        </div>
    </div>
</div>
@endsection
