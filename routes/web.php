<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('proveedores', ProveedorController::class)
->parameters(['proveedores' => 'proveedor']);

Route::get('/', function () {
    return view('welcome');
});
