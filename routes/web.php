<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\WorkerController;

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

Route::get('/trabajadores', [WorkerController::class, 'index'])->name('workers');

Route::get('/obras/add', [ObraController::class, 'create'])->name('addObra');

Route::get('/trabajadores/add', [WorkerController::class, 'create'])->name('addWorker');

Route::post('/obras/add', [ObraController::class, 'store'])->name('createObra');

Route::post('/trabajadores/add', [WorkerController::class, 'store'])->name('createWorker');

Route::any('/obras/{obra_id}', [ObraController::class, 'show'])->name('obra');

Route::any('/trabajadores/{worker_id}', [WorkerController::class, 'show'])->name('worker');

Route::any('/obras/modify/{obra_id}', [ObraController::class, 'update'])->name('modObra');

Route::any('/trabajadores/modify/{worker_id}', [WorkerController::class, 'update'])->name('modWorker');

Route::any('/obras/delete/{obra_id}', [ObraController::class, 'destroy'])->name('deleteObra');

Route::any('/trabajadores/delete/{worker_id}', [WorkerController::class, 'destroy'])->name('deleteWorker');
