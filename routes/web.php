<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $movies = Movie::latest()->take(10)->get();
    return view('dashboard', ['movies' => $movies]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/movies', MovieController::class)->names('admin.movies');
});

require __DIR__.'/auth.php';
