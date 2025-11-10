<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin/music')->name('music.')->group(function () {
    Route::get('/', [MusicController::class, 'index'])->name('index');
    Route::get('/create', [MusicController::class, 'create'])->name('create');
    Route::post('/store', [MusicController::class, 'store'])->name('store');
    Route::get('/{music}/edit', [MusicController::class, 'edit'])->name('edit');
    Route::put('/{music}', [MusicController::class, 'update'])->name('update');
    Route::delete('/{music}', [MusicController::class, 'destroy'])->name('destroy');

    // Play & Download
    Route::post('/{music}/play', [MusicController::class, 'play'])->name('play');
    Route::get('/{music}/download', [MusicController::class, 'download'])->name('download');
});
