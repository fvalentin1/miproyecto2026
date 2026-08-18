<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clubs', ClubController::class);
