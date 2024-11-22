<?php

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





// Rutas para Eventos
Route::resource('eventos', EventoController::class);

// Rutas para Noticias
Route::resource('noticias', NoticiaController::class);

// Rutas para Ponentes
Route::resource('ponentes', PonenteController::class);
