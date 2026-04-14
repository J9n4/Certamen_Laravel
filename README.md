# Certamen_Laravel
Comandos ejecutados para la instalacion del servidor 
composer create-project laravel/laravel Certamen_laravel
 

![servidor funcionando](image.png)


## Rutas de la Aplicación (routes/web.php)

| Método | URL | Nombre Ruta | Controlador | Descripción |
|--------|-----|------------|-------------|-------------|
| GET | `/` | - | welcome | Página de bienvenida |
| GET | `/recetas` | `recetas.index` | `RecetaController@index` | Listado de recetas con filtros |
| GET | `/recetas/create` | `recetas.create` | `RecetaController@create` | Formulario para crear receta |
| POST | `/recetas` | `recetas.store` | `RecetaController@store` | Guarda nueva receta en sesión |
| GET | `/recetas/{id}` | `recetas.show` | `RecetaController@show` | Detalle de una receta específica |
| GET | `/buscar` | `recetas.buscar` | `RecetaController@buscar` | Búsqueda avanzada de recetas |
