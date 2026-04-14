@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-pink-50 to-red-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Botón volver -->
        <div class="mb-6">
            <a href="{{ route('recetas.index') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-700 font-bold py-3 px-6 rounded-lg shadow-md transition">
                ← Volver a recetas
            </a>
        </div>

        <!-- Card principal -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Imagen de la receta -->
            @if(isset($receta['imagen_url']))
                <div class="w-full h-96 overflow-hidden bg-gray-200">
                    <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            @endif

            <!-- Header con gradiente -->
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-8 text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $receta['nombre'] }}</h1>
                
                <!-- Badges -->
                <div class="flex flex-wrap gap-3">
                    <span class="inline-block bg-white bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-bold border border-white border-opacity-30">
                        {{ $receta['tipo'] }}
                    </span>
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-bold border border-white border-opacity-30
                        {{ $receta['dificultad'] === 'Fácil' ? 'bg-green-400 bg-opacity-30' : ($receta['dificultad'] === 'Media' ? 'bg-yellow-400 bg-opacity-30' : 'bg-red-400 bg-opacity-30') }}">
                        🎯 {{ $receta['dificultad'] }}
                    </span>
                    <span class="inline-block bg-white bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-bold border border-white border-opacity-30">
                        ⏱️ {{ $receta['tiempo'] }} min
                    </span>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="p-8 md:p-10">
                <!-- Descripción -->
                <section class="mb-10">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 pb-3 border-b-4 border-purple-600">Descripción</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">{{ $receta['descripcion'] }}</p>
                </section>

                <!-- Info Grid -->
                <section class="mb-10">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 pb-3 border-b-4 border-purple-600">Información</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Tipo de Comida -->
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border-l-4 border-orange-500">
                            <p class="text-orange-600 text-sm font-bold uppercase tracking-wide mb-2">Tipo de Comida</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $receta['tipo'] }}</p>
                        </div>

                        <!-- Dificultad -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border-l-4 border-blue-500">
                            <p class="text-blue-600 text-sm font-bold uppercase tracking-wide mb-2">Dificultad</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $receta['dificultad'] }}</p>
                        </div>

                        <!-- Tiempo -->
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border-l-4 border-green-500">
                            <p class="text-green-600 text-sm font-bold uppercase tracking-wide mb-2">Tiempo</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $receta['tiempo'] }} min</p>
                        </div>
                    </div>
                </section>

                <!-- Ingredientes -->
                <section class="mb-10">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 pb-3 border-b-4 border-purple-600">
                        Ingredientes ({{ count($receta['ingredientes']) }})
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($receta['ingredientes'] as $ingrediente)
                            <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border-l-4 border-green-500 hover:shadow-md transition">
                                <span class="flex-shrink-0 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">✓</span>
                                <span class="text-gray-800 font-medium">{{ trim($ingrediente) }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Pasos -->
                @if(!empty($receta['pasos']))
                    <section>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6 pb-3 border-b-4 border-purple-600">
                            Pasos de Preparación ({{ count($receta['pasos']) }})
                        </h2>
                        <div class="space-y-4">
                            @foreach($receta['pasos'] as $index => $paso)
                                <div class="flex gap-6 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border-l-4 border-blue-500 hover:shadow-md transition">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                        {{ $index + 1 }}
                                    </div>
                                    <p class="text-gray-800 font-medium leading-relaxed pt-1">{{ trim($paso) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <!-- Footer con acciones -->
            <div class="bg-gray-50 px-8 py-6 flex justify-between items-center border-t border-gray-200">
                <p class="text-gray-600 text-sm">📋 Receta {{ $receta['id'] }}</p>
                <a href="{{ route('recetas.index') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-2 px-6 rounded-lg transition transform hover:scale-105 shadow-md">
                    Volver a recetas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
