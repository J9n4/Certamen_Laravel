<!-- Tarjeta de Receta Reutilizable -->
<a href="{{ route('recetas.show', ['id' => $receta['id']]) }}" class="group">
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition-all duration-300 overflow-hidden h-full">
        <!-- Imagen -->
        <div class="relative h-48 bg-gray-200 overflow-hidden">
            @if(isset($receta['imagen_url']))
                <img 
                    src="{{ $receta['imagen_url'] }}" 
                    alt="{{ $receta['nombre'] }}" 
                    class="w-full h-full object-cover"
                >
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-400">
                    Sin imagen
                </div>
            @endif
            
            <!-- Tipo de comida badge -->
            <div class="absolute top-3 left-3 bg-white bg-opacity-90 px-3 py-1 rounded-full text-xs font-bold text-blue-600">
                {{ $receta['tipo'] }}
            </div>
        </div>

        <!-- Contenido -->
        <div class="p-4">
            <!-- Nombre -->
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">
                {{ $receta['nombre'] }}
            </h3>

            <!-- Dificultad y tiempo -->
            <div class="flex justify-between items-center mb-4">
                <span class="inline-block px-2 py-1 rounded text-xs font-bold
                    {{ $receta['dificultad'] === 'Fácil' ? 'bg-green-100 text-green-700' : ($receta['dificultad'] === 'Media' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                    {{ $receta['dificultad'] }}
                </span>
                <span class="text-sm text-gray-700 font-semibold">
                    {{ $receta['tiempo'] }} min
                </span>
            </div>

            <!-- Descripción -->
            <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                {{ $receta['descripcion'] ?? 'Deliciosa receta tradicional chilena' }}
            </p>

            <!-- Botón ver más -->
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                Ver receta
            </button>
        </div>
    </div>
</a>
        </div>
    </div>
</a>
