<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/usuarios', function () {
    return view('usuarios');
})->middleware(['auth', 'verified'])->name('usuarios');

//Clientes
Route::get('/clientes', [App\Http\Controllers\CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('customer');
Route::post('/clientes/store', [App\Http\Controllers\CustomerController::class, 'store'])->middleware(['auth', 'verified'])->name('addcustomer');

//Contratistas 
Route::get('/contratistas', [App\Http\Controllers\ContractorController::class, 'index'])->middleware(['auth', 'verified'])->name('contractor');
Route::post('/contratistas/store', [App\Http\Controllers\ContractorController::class, 'store'])->middleware(['auth', 'verified'])->name('addcontractor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
