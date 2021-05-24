<?php

use App\Http\Livewire\Taller\Talleres;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taller\InscripcionesController;
use App\Http\Livewire\Taller\CrearTaller;

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
    });

});

Route::get("/talleres", Talleres::class)->name('talleres.index');
Route::post("/inscripcion", [InscripcionesController::class, 'store'])->name('taller.inscripcion');
