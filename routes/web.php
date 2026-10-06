<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ConfederationController;

use App\Models\Club;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $before2000 = Club::where('founded_year', '<', 2000)->count();
    $after2000 = Club::where('founded_year', '>=', 2000)->count();

    return view('dashboard', compact('before2000', 'after2000'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clubs', ClubController::class);
    Route::resource('confederations', ConfederationController::class);
});

require __DIR__.'/auth.php';

