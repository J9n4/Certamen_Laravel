@extends('layouts.app')

@section('title', 'Crear Receta - RecetasChilenas')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-8">
            <h1 class="text-4xl font-bold text-white mb-2">Crear Nueva Receta</h1>
            <p class="text-purple-100">Comparte tu receta favorita con nosotros</p>
        </div>

        <!-- Formulario -->
        <form action="{{ route('recetas.store') }}" method="POST" class="p-8">
            @csrf

            <!-- Nombre -->
            <div class="mb-6">
                <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">
                    Nombre de la Receta <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    value="{{ old('nombre') }}"
                    placeholder="Ej: Empanad de Pino"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('nombre') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none"
                    required
                >
                @error('nombre')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Tipo de Comida -->
            <div class="mb-6">
                <label for="tipo" class="block text-sm font-bold text-gray-700 mb-2">
                    Tipo de Comida <span class="text-red-500">*</span>
                </label>
                <select 
                    id="tipo" 
                    name="tipo"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('tipo') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none"
                    required
                >
                    <option value="">-- Seleccionar --</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo }}" {{ old('tipo') === $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>
                @error('tipo')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Dificultad -->
            <div class="mb-6">
                <label for="dificultad" class="block text-sm font-bold text-gray-700 mb-2">
                    Dificultad <span class="text-red-500">*</span>
                </label>
                <select 
                    id="dificultad" 
                    name="dificultad"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('dificultad') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none"
                    required
                >
                    <option value="">-- Seleccionar --</option>
                    @foreach($dificultades as $dificultad)
                        <option value="{{ $dificultad }}" {{ old('dificultad') === $dificultad ? 'selected' : '' }}>{{ $dificultad }}</option>
                    @endforeach
                </select>
                @error('dificultad')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-2">
                    Descripción <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="descripcion" 
                    name="descripcion" 
                    rows="4"
                    placeholder="Describe brevemente tu receta..."
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('descripcion') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none resize-none"
                    required
                >{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Ingredientes -->
            <div class="mb-6">
                <label for="ingredientes" class="block text-sm font-bold text-gray-700 mb-2">
                    Ingredientes (separados por comas) <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="ingredientes" 
                    name="ingredientes" 
                    rows="3"
                    placeholder="Ej: Harina, Huevo, Sal, Agua, Aceite"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('ingredientes') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none resize-none"
                    required
                >{{ old('ingredientes') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">💡 Separa cada ingrediente usando comas</p>
                @error('ingredientes')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Pasos de Preparación -->
            <div class="mb-6">
                <label for="pasos" class="block text-sm font-bold text-gray-700 mb-2">
                    Pasos de Preparación (separados por |) <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="pasos" 
                    name="pasos" 
                    rows="4"
                    placeholder="Ej: Mezclar ingredientes | Añadir relleno | Hornear a 180°C"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('pasos') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none resize-none"
                    required
                >{{ old('pasos') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">💡 Separa cada paso usando el símbolo |</p>
                @error('pasos')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Tiempo -->
            <div class="mb-6">
                <label for="tiempo" class="block text-sm font-bold text-gray-700 mb-2">
                    Tiempo (en minutos) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    id="tiempo" 
                    name="tiempo" 
                    min="1"
                    max="480"
                    value="{{ old('tiempo') }}"
                    placeholder="30"
                    class="w-full px-4 py-3 border-2 rounded-lg transition @error('tiempo') border-red-500 bg-red-50 @else border-gray-300 focus:border-purple-500 @enderror focus:outline-none"
                    required
                >
                @error('tiempo')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
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
                    value="{{ old('imagen_url') }}"
                    placeholder="https://ejemplo.com/imagen.jpg"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 transition @error('imagen_url') border-red-500 bg-red-50 @enderror"
                >
                <p class="text-xs text-gray-500 mt-1">🖼️ Si no ingresas una URL, se usará una imagen por defecto</p>
                @error('imagen_url')
                    <div class="text-red-600 text-sm mt-2 flex items-center gap-2">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex gap-4">
                <button 
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105"
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

@endsection
