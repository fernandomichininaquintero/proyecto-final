<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObraController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/obras', [ObraController::class, 'index'])->name('obras');

Route::get('/obras/add', [ObraController::class, 'create'])->name('addObra');

Route::post('/obras/add', [ObraController::class, 'store'])->name('createObra');

Route::any('/obras/{obra_id}', [ObraController::class, 'show'])->name('obra');

Route::any('/obras/modify/{obra_id}', [ObraController::class, 'update'])->name('modObra');

Route::any('/obras/delete/{obra_id}', [ObraController::class, 'destroy'])->name('deleteObra');
