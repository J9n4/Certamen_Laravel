<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    private $recetas = [
        [
            'id' => 1,
            'nombre' => 'Empanadas de Pino',
            'tipo' => 'Entrada',
            'dificultad' => 'Media',
            'descripcion' => 'Empanadas tradicionales chilenas rellenas de masa y carne',
            'tiempo' => 45,
            'ingredientes' => ['Harina', 'Agua', 'Sal', 'Carne molida', 'Cebolla', 'Aceitunas', 'Huevo'],
            'pasos' => [
                '1. Preparar la masa con harina, agua y sal',
                '2. Dejar reposar la masa por 30 minutos',
                '3. Saltear la cebolla y cocinar la carne molida',
                '4. Agregar aceitunas y condimentos',
                '5. Rellenar las empanadas con la mezcla',
                '6. Sellar bien y pintar con huevo',
                '7. Hornear a 200°C por 25 minutos'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1555939594-58d7cb561537?w=500&h=400'
        ],
        [
            'id' => 2,
            'nombre' => 'Ceviche Chileno',
            'tipo' => 'Entrada',
            'dificultad' => 'Media',
            'descripcion' => 'Pescado fresco marinado en limón con sabores peruano-chilenos',
            'tiempo' => 30,
            'ingredientes' => ['Pez espada', 'Limón', 'Cebolla roja', 'Cilantro', 'Ajo', 'Ají', 'Tomate'],
            'pasos' => [
                '1. Cortar el pez espada en cubos pequeños',
                '2. Exprimir los limones para obtener el jugo',
                '3. Marinar el pescado en jugo de limón durante 15-20 minutos',
                '4. Preparar la salsa con cilantro, ajo y ají',
                '5. Mezclar el pescado con la salsa',
                '6. Servir con cebolla cruda y tomate'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&h=400'
        ],
        [
            'id' => 3,
            'nombre' => 'Pastel de Choclo',
            'tipo' => 'Plato Principal',
            'dificultad' => 'Media',
            'descripcion' => 'Platillo tradicional chileno de carne y choclo molido',
            'tiempo' => 60,
            'ingredientes' => ['Carne molida', 'Choclo', 'Cebolla', 'Olivas', 'Huevo', 'Queso', 'Condimientos'],
            'pasos' => [
                '1. Saltear la cebolla picada en una olla',
                '2. Agregar la carne molida y cocinar',
                '3. Añadir olivas y condimientos',
                '4. Verter la mezcla en un recipiente refractario',
                '5. Moler el choclo junto con leche',
                '6. Esparcir la mezcla de choclo como cobertura',
                '7. Hornear a 180°C por 30-40 minutos'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&h=400'
        ],
        [
            'id' => 4,
            'nombre' => 'Cazuela de Ave',
            'tipo' => 'Plato Principal',
            'dificultad' => 'Fácil',
            'descripcion' => 'Guiso tradicional chileno con pollo y verduras',
            'tiempo' => 50,
            'ingredientes' => ['Pollo', 'Papa', 'Zapallo', 'Cebolla', 'Ajo', 'Caldo de pollo', 'Condimentos'],
            'pasos' => [
                '1. Cortar el pollo en trozos y dorar en una olla',
                '2. Agregar cebolla y ajo picados',
                '3. Verter el caldo de pollo',
                '4. Cortar papas y zapallo en cubos',
                '5. Agregar las verduras al caldo',
                '6. Cocinar a fuego medio por 35-40 minutos',
                '7. Condimentar con sal y pimienta'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1432139555190-58524dae6a55?w=500&h=400'
        ],
        [
            'id' => 5,
            'nombre' => 'Porotos con Riendas',
            'tipo' => 'Plato Principal',
            'dificultad' => 'Fácil',
            'descripcion' => 'Porotos verdes con papas, un clásico de la cocina chilena',
            'tiempo' => 40,
            'ingredientes' => ['Porotos verdes', 'Papa', 'Maíz', 'Cebolla', 'Ajo', 'Aceite', 'Sal'],
            'pasos' => [
                '1. Lavar y desvainar los porotos verdes',
                '2. Cortar las papas en cubos pequeños',
                '3. Saltear cebolla y ajo en aceite',
                '4. Agregar los porotos verdes cortados',
                '5. Añadir las papas y el maíz',
                '6. Cocinar con agua por 25-30 minutos',
                '7. Servir caliente'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&h=400'
        ],
        [
            'id' => 6,
            'nombre' => 'Huesillos',
            'tipo' => 'Postre',
            'dificultad' => 'Fácil',
            'descripcion' => 'Bebida dulce chilena de durazno seco y maicena',
            'tiempo' => 120,
            'ingredientes' => ['Durazno seco', 'Azúcar', 'Maicena', 'Agua', 'Canela'],
            'pasos' => [
                '1. Remojar los duraznos secos en agua durante una noche',
                '2. Cocinar los duraznos en agua con azúcar durante 1 hora',
                '3. Colar el líquido y reservar',
                '4. Diluir maicena en agua fría',
                '5. Agregar la maicena al caldo de durazno',
                '6. Cocinar revolviendo constantemente',
                '7. Servir frío con los duraznos'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1590080876-1f1b5495e4b5?w=500&h=400'
        ],
        [
            'id' => 7,
            'nombre' => 'Mote con Huesillo',
            'tipo' => 'Postre',
            'dificultad' => 'Media',
            'descripcion' => 'Postre frío de mote de trigo con bebida de durazno',
            'tiempo' => 180,
            'ingredientes' => ['Trigo perlado', 'Durazno seco', 'Azúcar', 'Agua', 'Vainilla'],
            'pasos' => [
                '1. Remojar el trigo la noche anterior',
                '2. Cocinar el trigo durante 2-3 horas hasta que esté tierno',
                '3. Preparar la bebida de durazno por separado',
                '4. Colar ambos preparados',
                '5. Servir el mote en un vaso con la bebida de huesillo',
                '6. Acompañar con un durazno seco',
                '7. Consumir frío'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1629985298213-d6a87b2b2aea?w=500&h=400'
        ],
        [
            'id' => 8,
            'nombre' => 'Alfajores Chilenos',
            'tipo' => 'Postre',
            'dificultad' => 'Media',
            'descripcion' => 'Galletas rellenas de dulce de leche cubierto con chocolate',
            'tiempo' => 90,
            'ingredientes' => ['Harina', 'Huevo', 'Mantequilla', 'Azúcar', 'Vainilla', 'Dulce de leche', 'Chocolate'],
            'pasos' => [
                '1. Mezclar mantequilla con azúcar hasta obtener crema',
                '2. Agregar los huevos uno a uno',
                '3. Incorporar harina tamizada y vainilla',
                '4. Formar pequeñas galletas y hornear a 180°C por 10-12 minutos',
                '5. Dejar enfriar completamente',
                '6. Rellenar cada alfajor con dulce de leche',
                '7. Cubrir con chocolate derretido'
            ],
            'imagen_url' => 'https://images.unsplash.com/photo-1584080298039-4a2a8be26eda?w=500&h=400'
        ]
    ];

    public function index(Request $request)
    {
        $recetas = session('recetas', $this->recetas);
        
        // Filtro por tipo de comida (query string: ?tipo=Postre)
        if ($request->has('tipo') && $request->tipo !== '') {
            $recetas = array_filter($recetas, function($receta) use ($request) {
                return $receta['tipo'] === $request->tipo;
            });
        }
        
        // Filtro por dificultad (query string: ?dificultad=facil)
        if ($request->has('dificultad') && $request->dificultad !== '') {
            $recetas = array_filter($recetas, function($receta) use ($request) {
                return strtolower($receta['dificultad']) === strtolower($request->dificultad);
            });
        }
        
        // Búsqueda por nombre
        if ($request->has('buscar') && $request->buscar !== '') {
            $buscar = strtolower($request->buscar);
            $recetas = array_filter($recetas, function($receta) use ($buscar) {
                return strpos(strtolower($receta['nombre']), $buscar) !== false;
            });
        }
        
        // Reindexar el array después de los filtros
        $recetas = array_values($recetas);
        
        // Obtener opciones únicas para los select
        $tipos = ['Entrada', 'Plato Principal', 'Postre'];
        $dificultades = ['Fácil', 'Media', 'Difícil'];
        
        // Obtener valores actuales de filtros
        $filtros = [
            'tipo' => $request->query('tipo', ''),
            'dificultad' => $request->query('dificultad', ''),
            'buscar' => $request->query('buscar', '')
        ];
        
        return view('recetas.index')->with(compact('recetas', 'tipos', 'dificultades', 'filtros'));
    }

    public function show($id)
    {
        // Validar que el id sea un número entero
        if (!is_numeric($id) || $id < 0) {
            return redirect()->route('recetas.index')
                ->with('error', 'ID de receta inválido');
        }

        $todasLasRecetas = session('recetas', $this->recetas);
        $receta = collect($todasLasRecetas)->firstWhere('id', (int)$id);
        
        // Si la receta no existe, redirigir al índice con mensaje de error
        if (!$receta) {
            return redirect()->route('recetas.index')
                ->with('error', 'La receta que buscas no existe');
        }
        
        return view('recetas.show')->with(compact('receta'));
    }

    public function create()
    {
        $tipos = ['Entrada', 'Plato Principal', 'Postre'];
        $dificultades = ['Fácil', 'Media', 'Difícil'];
        
        return view('recetas.create')->with(compact('tipos', 'dificultades'));
    }

    public function store(Request $request)
    {
        // Obtener recetas de la sesión o usar las por defecto
        $recetas = session('recetas', $this->recetas);
        
        // Calcular el próximo ID
        $maxId = collect($recetas)->max('id') ?? 0;
        $nuevoId = $maxId + 1;
        
        // Crear nueva receta
        $nuevaReceta = [
            'id' => $nuevoId,
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'dificultad' => $request->dificultad,
            'descripcion' => $request->descripcion,
            'tiempo' => $request->tiempo,
            'ingredientes' => array_filter(explode(',', $request->ingredientes), fn($i) => trim($i) !== ''),
            'pasos' => array_filter(explode('|', $request->pasos ?? ''), fn($p) => trim($p) !== ''),
            'imagen_url' => $request->imagen_url ?? 'https://via.placeholder.com/500x400?text=Receta'
        ];
        
        // Agregar a la lista y guardar en sesión
        $recetas[] = $nuevaReceta;
        session(['recetas' => $recetas]);
        
        return redirect()->route('recetas.show', ['id' => $nuevoId])
                        ->with('success', 'Receta creada exitosamente');
    }

    public function buscar(Request $request)
    {
        $recetas = session('recetas', $this->recetas);
        $query = strtolower($request->buscar ?? '');
        
        if ($query === '') {

            return redirect()->route('recetas.index');
        }
        
        // Filtro por búsqueda
        $resultados = array_filter($recetas, function($receta) use ($query) {
            return strpos(strtolower($receta['nombre']), $query) !== false ||
                   strpos(strtolower($receta['descripcion']), $query) !== false;
        });
        
        $resultados = array_values($resultados);
        
        $tipos = ['Entrada', 'Plato Principal', 'Postre'];
        $dificultades = ['Fácil', 'Media', 'Difícil'];
        
        return view('recetas.buscar')->with(compact('resultados', 'query', 'tipos', 'dificultades'));
    }
}