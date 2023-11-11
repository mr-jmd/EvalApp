<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/usuarios', function () {
    return view('usuarios');
})->middleware(['auth', 'verified'])->name('users');

//Clientes
Route::get('/clientes', [App\Http\Controllers\CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('customer');
Route::post('/clientes/store', [App\Http\Controllers\CustomerController::class, 'store'])->middleware(['auth', 'verified'])->name('addcustomer');

//Contratistas 
Route::get('/contratistas', [App\Http\Controllers\ContractorController::class, 'index'])->middleware(['auth', 'verified'])->name('contractor');
Route::post('/contratistas/store', [App\Http\Controllers\ContractorController::class, 'store'])->middleware(['auth', 'verified'])->name('addcontractor');

//Contrato
Route::get('/contrato', [App\Http\Controllers\contractController::class, 'index'])->middleware(['auth', 'verified'])->name('contract');
Route::post('/contrato/store', [App\Http\Controllers\contractController::class, 'store'])->middleware(['auth', 'verified'])->name('addcontract');

//Proyectos 
Route::get('/proyectos', [App\Http\Controllers\ProjectsController::class, 'index'])->middleware(['auth', 'verified'])->name('projects');
Route::post('/proyectos/store', [App\Http\Controllers\ProjectsController::class, 'store'])->middleware(['auth', 'verified'])->name('addproject');

//Avaluos
Route::get('/avaluos', [App\Http\Controllers\ApparaisalController::class, 'index'])->middleware(['auth', 'verified'])->name('apparaisal');
Route::post('/avaluos/store', [App\Http\Controllers\ApparaisalController::class, 'store'])->middleware(['auth', 'verified'])->name('addapparaisal');

//Reconsideraciones
Route::get('/reconsideraciones', [App\Http\Controllers\ReconsiderationsController::class, 'index'])->middleware(['auth', 'verified'])->name('reconsiderations');
Route::post('/reconsideraciones/store', [App\Http\Controllers\ReconsiderationsController::class, 'store'])->middleware(['auth', 'verified'])->name('addreconsiderations');
Route::delete('/reconsideraciones/destroy', [App\Http\Controllers\ReconsiderationsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteReconsiderations');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
