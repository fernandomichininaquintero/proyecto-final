<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Users;
use App\Http\Controllers\PortadaController;
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

Route::get('/', [PortadaController::class, 'index'])->name('home');

Route::get('/obras', [ObraController::class, 'index'])->name('obras')->middleware('auth');

Route::get('/obras/add', [ObraController::class, 'create'])->name('addObra')->middleware('auth');

Route::post('/obras/add', [ObraController::class, 'store'])->name('createObra')->middleware('auth');

Route::any('/obras/{obra_id}', [ObraController::class, 'show'])->name('obra')->middleware('auth');

Route::any('/obras/modify/{obra_id}', [ObraController::class, 'update'])->name('modObra')->middleware('auth');

Route::any('/obras/delete/{obra_id}', [ObraController::class, 'destroy'])->name('deleteObra')->middleware('auth');

Route::get('/trabajadores', [WorkerController::class, 'index'])->name('workers')->middleware('auth');

Route::get('/trabajadores/add', [WorkerController::class, 'create'])->name('addWorker')->middleware('auth');

Route::post('/trabajadores/add', [WorkerController::class, 'store'])->name('createWorker')->middleware('auth');

Route::any('/trabajadores/{worker_id}', [WorkerController::class, 'show'])->name('worker')->middleware('auth')->middleware('auth');

Route::any('/trabajadores/modify/{worker_id}', [WorkerController::class, 'update'])->name('modWorker')->middleware('auth');

Route::any('/trabajadores/delete/{worker_id}', [WorkerController::class, 'destroy'])->name('deleteWorker')->middleware('auth');

Route::get('/trabajadores/{worker_id}/salary', [WorkerController::class, 'showSalary'])->name('salary')->middleware('auth');

Route::any('/trabajadores/{worker_id}/salary/add', [WorkerController::class, 'addSalary'])->name('addSalary')->middleware('auth');

Route::any('/eliminar-usuario', [Users::class, 'destroy'])->name('user.delete')->middleware('auth');

Auth::routes();

