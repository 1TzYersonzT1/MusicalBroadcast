<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Evento\Eventos;
use App\Http\Livewire\Taller\Talleres;
use App\Http\Livewire\Taller\InscripcionTaller;
use App\Http\Livewire\Administrador\Talleres\Talleres as AdminTaller;
use App\Http\Livewire\Administrador\Eventos\Eventos as AdminEvento;
use App\Http\Livewire\Administrador\Artistas\Artistas as AdminArtista;
use App\Http\Livewire\Artista\Artistas;
use App\Http\Livewire\Artista\ArtistaPreview;
use App\Http\Livewire\Representante\Artista\Crear\CrearArtista;
use App\Http\Livewire\Representante\Artista\TusArtistas;
use App\Http\Livewire\Organizador\Eventos\Crear\CrearEvento;
use App\Http\Livewire\Organizador\Eventos\MisEventos;
use App\Http\Livewire\Organizador\Eventos\ModificarEvento;
use App\Http\Livewire\Organizador\Eventos\Asistentes\Asistentes as AsistentesEvento;
use App\Http\Livewire\Organizador\Talleres\Crear\CrearTaller;
use App\Http\Livewire\Organizador\Talleres\MisTalleres;
use App\Http\Livewire\Organizador\Talleres\ModificarTaller;
use App\Http\Livewire\Organizador\Talleres\Asistentes\Asistentes as AsistenteTaller;



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

Route::group(["middleware" => 'auth'], function() {

    Route::group(["middleware" => "role:organizador", "prefix" => "organizador", "as" => "organizador."], function() {
        // Ruta de taller
        Route::get("/crear-taller", CrearTaller::class)->name("creartaller");

        Route::get('/mis-solicitudes', MisTalleres::class)->name('mis-solicitudes');
        Route::get("/modificar-taller/{id}", ModificarTaller::class)->name("modificar-taller");

        Route::get("/asistentes/taller", AsistenteTaller::class)->name("taller/asistentes");

        // Ruta de evento
        Route::get("/crear-evento", CrearEvento::class)->name("crearevento");
        Route::get("/eventos/mis-solicitudes", MisEventos::class)->name("mis-eventos");
        Route::get("/modificar-evento/{id}", ModificarEvento::class)->name("modificar-evento");

        Route::get("/asistentes/evento", AsistentesEvento::class)->name("evento/asistentes");
    });

    Route::group(['middleware' => 'role:representante', 'prefix' => 'representante', 'as' => 'representante.'], function() {
        Route::get("/crear-artista", CrearArtista::class)->name("crearartista");
        Route::get("/tus-artistas", TusArtistas::class)->name("tusartistas");

        Route::get("/artistas/mis-solicitudes");
       
    });
    
    Route::group(['middleware' => 'role:administrador', 'prefix' => 'administrador', 'as' => 'administrador.'], function() {
        Route::get('/solicitudes/talleres', AdminTaller::class)->name("talleres");
        Route::get("/solicitudes/eventos", AdminEvento::class)->name("eventos"); 
        Route::get("/solicitudes/artistas", AdminArtista::class)->name("artistas"); 
    });

});

Route::get("/talleres", Talleres::class)->name('talleres.index');
Route::post("/inscripcion", InscripcionTaller::class)->name('taller.inscripcion');
Route::get("/eventos", Eventos::class)->name("eventos.index");



Route::get("/artistas", Artistas::class)->name('artistas.index');
Route::get('/artista/{artista}', ArtistaPreview::class)->name("artista.show");


Route::get("/reglamento", function() {
    return view("terms");
})->name("reglamento");
Route::get("/ayuda", function() {
    return view("help");
})->name("ayuda");
Route::get("/terminos-condiciones", function() {
    return view("terms");
})->name("terminos-condiciones");

