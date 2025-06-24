<?php

use App\Models\armada;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    $foto = armada::all();
    return view('welcome', ['foto' => $foto]);
});

Route::middleware(['auth'])->group(function () {

    // Ini adalah route yang akan diakses setelah login default Laravel
    // atau jika RouteServiceProvider::HOME mengarah ke '/dashboard'.
    // Jika Anda ingin langsung ke Filament, Anda bisa mengubah ini.
    Route::get('/dashboard', function () {
        // Langsung redirect ke dashboard Filament
        return Redirect::to('/admin'); // Atau gunakan Redirect::route('filament.pages.dashboard') jika Filament memiliki nama route tersebut
    })->name('dashboard'); // Tetapkan nama route ini sebagai 'dashboard'

    // Pastikan Anda juga memiliki rute ke dashboard Filament itu sendiri:
    // Filament akan menangani ini, biasanya di 'vendor/filament/filament/src/FilamentServiceProvider.php'
    // Anda tidak perlu menulisnya di sini kecuali Anda mengubah path-nya.
    // Route::get('/admin', '...'); // Ini adalah route dashboard Filament

    // Route lain yang hanya bisa diakses setelah login
    Route::get('/profile', function () {
        return "Ini halaman profil saya.";
    })->name('profile');
});




Route::get('/logout', [AuthenticatedSessionController::class , 'destroy']);


require __DIR__.'/auth.php';
