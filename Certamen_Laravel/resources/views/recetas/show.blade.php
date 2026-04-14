@extends('layouts.app')

@section('title', 'Detalle de Receta - RecetasChilenas')

@section('content')
    <div>
        <a href="{{ route('recetas.index') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-700 font-bold py-3 px-6 rounded-lg shadow-md transition mb-6">Volver</a>

        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            @if(isset($receta['imagen_url']))
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ $receta['imagen_url'] }}" alt="{{ $receta['nombre'] }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="bg-blue-600 p-8 text-white">
                <h1 class="text-4xl font-bold mb-6">{{ $receta['nombre'] }}</h1>
                
                <div class="flex flex-wrap gap-3">
                    <span class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-bold">{{ $receta['tipo'] }}</span>
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-bold @if($receta['dificultad'] === 'Fácil') bg-green-400 bg-opacity-30 @elseif($receta['dificultad'] === 'Media') bg-yellow-400 bg-opacity-30 @else bg-red-400 bg-opacity-30 @endif">{{ $receta['dificultad'] }}</span>
                    <span class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-bold">{{ $receta['tiempo'] }} min</span>
                </div>
            </div>

            <div class="p-8">
                <!-- Descripción -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-3">Descripción</h2>
                    <p class="text-lg text-gray-700">{{ $receta['descripcion'] }}</p>
                </section>

                <!-- Ingredientes -->
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-blue-600 pb-3">Ingredientes</h2>
                    <div class="space-y-3">
                        @foreach($receta['ingredientes'] as $ingrediente)
                            <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                                <span class="flex-shrink-0 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">+</span>
                                <span class="text-gray-800 font-medium">{{ $ingrediente }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Pasos de Preparación -->
                @if(!empty($receta['pasos']))
                    <section class="mb-10">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-blue-600 pb-3">Pasos de Preparación</h2>
                        <div class="space-y-4">
                            @foreach($receta['pasos'] as $index => $paso)
                                <div class="flex gap-6 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                                    <div class="flex-shrink-0 w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-lg">{{ $loop->iteration }}</div>
                                    <p class="text-gray-800 font-medium pt-2">{{ $paso }}</p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div class="bg-gray-50 px-8 py-6 border-t">
                <a href="{{ route('recetas.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">Volver a recetas</a>
            </div>
        </div>
    </div>
@endsection
