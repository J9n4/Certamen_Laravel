<!-- Tarjeta de Receta Reutilizable -->
<a href="{{ route('recetas.show', ['id' => $receta['id']]) }}" class="group">
    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden h-full transform hover:scale-105">
        <!-- Imagen -->
        <div class="relative h-48 bg-gradient-to-br from-purple-200 to-pink-200 overflow-hidden">
            @if(isset($receta['imagen_url']))
                <img 
                    src="{{ $receta['imagen_url'] }}" 
                    alt="{{ $receta['nombre'] }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                >
            @else
                <div class="w-full h-full flex items-center justify-center text-6xl">
                    🍽️
                </div>
            @endif
            
            <!-- Tipo de comida badge -->
            <div class="absolute top-3 left-3 bg-white bg-opacity-90 px-3 py-1 rounded-full text-xs font-bold text-purple-600">
                {{ $receta['tipo'] }}
            </div>
        </div>

        <!-- Contenido -->
        <div class="p-5">
            <!-- Nombre -->
            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-purple-600">
                {{ $receta['nombre'] }}
            </h3>

            <!-- Dificultad y tiempo -->
            <div class="flex justify-between items-center mb-4">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                    {{ $receta['dificultad'] === 'Fácil' ? 'bg-green-100 text-green-700' : ($receta['dificultad'] === 'Media' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                    {{ $receta['dificultad'] }}
                </span>
                <span class="text-sm text-gray-700 font-semibold flex items-center gap-1">
                    ⏱️ {{ $receta['tiempo'] }} min
                </span>
            </div>

            <!-- Descripción -->
            <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                {{ $receta['descripcion'] ?? 'Deliciosa receta tradicional chilena' }}
            </p>

            <!-- Botón ver más -->
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Ver receta →
            </button>
        </div>
    </div>
</a>
