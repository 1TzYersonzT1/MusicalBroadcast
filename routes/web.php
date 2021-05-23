<?php

use App\Http\Livewire\Taller\Talleres;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taller\InscripcionesController;
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

Route::get("/talleres", Talleres::class)->name('talleres.index');
Route::post("/talleres", [InscripcionesController::class, 'store'])->name('taller.inscripcion');
