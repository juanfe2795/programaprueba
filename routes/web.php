<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route Hooks - Do not delete//
	Route::view('Empresas', 'livewire.Empresas.index')->middleware('auth');
	Route::view('Deudas', 'livewire.Deudas.index')->middleware('auth');
	Route::view('Ingresos', 'livewire.Ingresos.index')->middleware('auth');
	Route::view('Egresos', 'livewire.Egresos.index')->middleware('auth');
	Route::view('Ahorros', 'livewire.Ahorros.index')->middleware('auth');
	Route::view('Permisos', 'livewire.Permisos.index')->middleware('auth');
	Route::view('Modulos', 'livewire.Modulos.index')->middleware('auth');
	Route::view('Rols', 'livewire.Rols.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');