<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\Evento2Controller;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Noticia2Controller;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\Ponente2Controller;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CalendarioController;
use App\Models\Evento;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/',[InicioController::class, 'index']);
    
// routes/web.php
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');

Route::get('/inicio', [InicioController::class, 'index']);

//Rutas para eventos en vistas de usuario
Route::get('/eventos2', [Evento2Controller::class, 'index'])->name('eventos2.index');// esta es el index el que se abre despuesd de presioanr en la navbar
Route::get('/eventos2/{id}', [Evento2Controller::class, 'show'])->name('eventos2.show'); //esta es del show donde se abre despuesd del botonazo

//Rutas para noticias en vistas de usuario
Route::get('/noticias2', [Noticia2Controller::class, 'index'])->name('noticias2.index');
Route::get('/noticias2/{id}', [Noticia2Controller::class, 'show'])->name('noticias2.show'); //esta es del show donde se abre despuesd del botonazo


//Rutas para ponentes en vistas de usuario
Route::get('/ponentes2', [Ponente2Controller::class, 'index'])->name('ponentes2.index');// esta es el index el que se abre despuesd de presioanr en la navbar
Route::get('/ponentes2/{id}', [Ponente2Controller::class, 'show'])->name('ponentes2.show'); //esta es del show donde se abre despuesd del botonazo

//Rutas para contacto vista
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');

Route::get('/calendario', function() {
    $eventos = Evento::all(); 
    return view('calendario', compact('eventos'));
})->name('calendario');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->resource('eventos', EventoController::class);

Route::resource('eventos', EventoController::class)
->middleware('auth')
->names('eventos');
Route::resource('noticias', NoticiaController::class)
->middleware('auth')
->names('noticias');
Route::resource('ponentes', PonenteController::class)
->middleware('auth')
->names(names: 'ponentes');




Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
