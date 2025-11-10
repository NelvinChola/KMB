<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('music', App\Http\Controllers\Admin\MusicController::class);
});
