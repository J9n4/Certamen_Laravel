@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-pink-50 to-red-50 p-6">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 px-8 py-8">
                <h1 class="text-4xl font-bold text-white mb-2">Crear Nueva Receta</h1>
                <p class="text-orange-100">Comparte tu receta favorita con nosotros</p>
            </div>

            <!-- Formulario -->
            <form action="{{ route('recetas.store') }}" method="POST" class="p-8">
                @csrf

                <!-- Nombre -->
                <div class="mb-6">
                    <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">
                        Nombre de la Receta
                    </label>
                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        placeholder="Ej: Pasta Alfredo"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    >
                </div>

                <!-- Tipo de Comida -->
                <div class="mb-6">
                    <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">
                        Tipo de Comida
                    </label>
                    <select 
                        id="tipo" 
                        name="tipo"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    >
                        <option value="">-- Seleccionar --</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dificultad -->
                <div class="mb-6">
                    <label for="dificultad" class="block text-sm font-bold text-gray-700 mb-2">
                        Dificultad
                    </label>
                    <select 
                        id="dificultad" 
                        name="dificultad"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    >
                        <option value="">-- Seleccionar --</option>
                        @foreach($dificultades as $dificultad)
                            <option value="{{ $dificultad }}">{{ $dificultad }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-2">
                        Descripción
                    </label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion" 
                        rows="4"
                        placeholder="Describe brevemente tu receta..."
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    ></textarea>
                </div>

                <!-- Ingredientes -->
                <div class="mb-6">
                    <label for="ingredientes" class="block text-sm font-bold text-gray-700 mb-2">
                        Ingredientes (separados por comas)
                    </label>
                    <textarea 
                        id="ingredientes" 
                        name="ingredientes" 
                        rows="3"
                        placeholder="Ej: Pasta, Queso, Crema, Mantequilla"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    ></textarea>
                </div>

                <!-- Pasos de Preparación -->
                <div class="mb-6">
                    <label for="pasos" class="block text-sm font-bold text-gray-700 mb-2">
                        Pasos de Preparación (separados por | símbolo)
                    </label>
                    <textarea 
                        id="pasos" 
                        name="pasos" 
                        rows="4"
                        placeholder="Ej: 1. Calentar agua | 2. Cocinar pasta | 3. Drenar bien"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                    ></textarea>
                    <p class="text-xs text-gray-500 mt-1">💡 Separa cada paso usando el símbolo |</p>
                </div>

                <!-- Tiempo -->
                <div class="mb-6">
                    <label for="tiempo" class="block text-sm font-bold text-gray-700 mb-2">
                        Tiempo (en minutos)
                    </label>
                    <input 
                        type="number" 
                        id="tiempo" 
                        name="tiempo" 
                        min="1"
                        placeholder="30"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                        required
                    >
                </div>

                <!-- Imagen URL -->
                <div class="mb-8">
                    <label for="imagen_url" class="block text-sm font-bold text-gray-700 mb-2">
                        URL de Imagen (opcional)
                    </label>
                    <input 
                        type="url" 
                        id="imagen_url" 
                        name="imagen_url" 
                        placeholder="https://ejemplo.com/imagen.jpg"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition"
                    >
                    <p class="text-xs text-gray-500 mt-1">🖼️ Si no ingresas una URL, se usará una imagen por defecto</p>
                </div>

                <!-- Botones -->
                <div class="flex gap-4">
                    <button 
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105"
                    >
                        ✓ Crear Receta
                    </button>
                    <a 
                        href="{{ route('recetas.index') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-3 px-6 rounded-lg transition text-center"
                    >
                        ✕ Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
