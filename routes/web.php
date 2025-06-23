<?php

use App\Models\armada;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    $mobil = armada::all();
    return view('welcome', compact('mobil'));
});

Route::get('/logout', [AuthenticatedSessionController::class , 'destroy']);


require __DIR__.'/auth.php';
