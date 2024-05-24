<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->group(function () {
    Route::resource('clients', ClientController::class);

    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
});