<?php

use App\Http\Livewire\Categorias;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Equipos;
use App\Http\Livewire\Prestamos;
use App\Http\Livewire\Proyectos;
use App\Http\Livewire\Solicituds;
use Illuminate\Support\Facades\Route;
use App\models\User;
use App\Http\Livewire\UsersTable;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', UsersTable::class)->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/categorias', Categorias::class)->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])->get('/equipos', Equipos::class)->name('equipos');

 Route::middleware(['auth:sanctum', 'verified'])->get('/prestamos', Prestamos::class)->name('prestamos');

Route::middleware(['auth:sanctum', 'verified'])->get('/proyectos', Proyectos::class)->name('proyectos');

Route::middleware(['auth:sanctum', 'verified'])->get('/solicitudes', solicituds::class)->name('solicitudes');
