<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealEstateSearchController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/test', function () {
    return view('landing');
});

Route::get('/search', [RealEstateSearchController::class, 'search'])->name('real_estate.search');