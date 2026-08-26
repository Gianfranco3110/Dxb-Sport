<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/vehiculos', [PageController::class, 'vehicles'])->name('vehicles');
Route::get('/vehiculos/{brand}', [PageController::class, 'vehicles'])->name('vehicles.brand');
Route::get('/servicios', [PageController::class, 'services'])->name('services');
Route::get('/como-trabajamos', [PageController::class, 'howWeWork'])->name('how-we-work');
Route::get('/nosotros', [PageController::class, 'about'])->name('about');
Route::get('/operaciones', [PageController::class, 'operations'])->name('operations');
