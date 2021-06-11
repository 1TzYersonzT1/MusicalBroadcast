<?php

use App\Http\Livewire\Taller\Talleres;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Taller\InscripcionTaller;
use App\Http\Livewire\Administrador\Solicitudes\Solicitudes;
use App\Http\Livewire\Organizador\Solicitudes\MisSolicitudes;
use App\Http\Livewire\Taller\CrearTaller;
use App\Http\Livewire\Artista\Artistas;
use App\Http\Livewire\Artista\ArtistaPreview;
use App\Http\Livewire\Evento\Eventos;
use App\Http\Livewire\Taller\Asistentes\Asistentes;


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
        Route::get("/crear-taller", CrearTaller::class)->name("creartaller");

        Route::get('/mis-solicitudes', MisSolicitudes::class)->name('mis-solicitudes');

        Route::get("/asistentes", Asistentes::class)->name("taller/asistentes");
    });

    Route::group(['middleware' => 'role:administrador', 'prefix' => 'administrador', 'as' => 'administrador.'], function() {
        Route::get('/solicitudes', Solicitudes::class)->name("solicitudes");
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

