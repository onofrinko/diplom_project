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

Route::get('/wishlist', [DashboardController::class, 'wishlist'])
    ->middleware(['auth', 'verified'])->name('wishlist');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/landlord/profile', [ProfileController::class, 'updateLandlord'])->name('profile.update-landlord');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/property/{property}/edit', [PropertyController::class, 'edit'])->name('property.edit');
    Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
    Route::get('/property/{property}/show', [PropertyController::class, 'show'])->name('property.show');
    Route::post('/property', [PropertyController::class, 'store'])->name('property.store');
    Route::patch('/property/{property}', [PropertyController::class, 'update'])->name('property.update');
    Route::patch('/property/{property}/wish', [PropertyController::class, 'wish'])->name('property.wish');
    Route::patch('/property/{property}/image', [PropertyController::class, 'updateImage'])->name('property.updateImage');
});

Route::get('/property/{id}', [DetailsController::class, 'show'])->name('show.details');

require __DIR__.'/auth.php';
