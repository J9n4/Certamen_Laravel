<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

Route::get('/', function () {
    return view('welcome');
});

// Recetas
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/recetas/{id}', [RecetaController::class, 'show'])->name('recetas.show');
Route::get('/buscar', [RecetaController::class, 'buscar'])->name('recetas.buscar');
