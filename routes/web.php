<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
Route::get('/', function () {
    return redirect('/characters');
});
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/upload', [CharacterController::class, 'uploadForm'])->name('characters.upload');
Route::post('/characters/upload', [CharacterController::class, 'uploadImage'])->name('characters.upload.post');
Route::get('/characters/ajax-search', [CharacterController::class, 'ajaxSearch'])->name('characters.ajaxSearch');
