<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RealEstateSearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('landing');
});

Route::get('/test', function () {
    return view('landing');
});

Route::get('/search', [RealEstateSearchController::class, 'search'])->name('real_estate.search');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/property/{id}', [DetailsController::class, 'show'])->name('show.details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/landlord/profile', [ProfileController::class, 'updateLandlord'])->name('profile.update-landlord');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/property/{property}/edit', [PropertyController::class, 'edit'])->name('property.edit');
    Route::patch('/property/{property}', [PropertyController::class, 'update'])->name('property.update');
});

require __DIR__.'/auth.php';
