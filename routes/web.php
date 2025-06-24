<?php

use App\Models\armada;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    $foto = armada::all();
    return view('welcome', ['foto' => $foto]);
});

Route::get('/logout', [AuthenticatedSessionController::class , 'destroy']);


require __DIR__.'/auth.php';
