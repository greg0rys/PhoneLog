<?php

use App\Http\Controllers\CDRRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-csv', [CDRRecordController::class, 'show'])->name('csv.show');
Route::post('/upload-csv', [CDRRecordController::class, 'store'])->name('csv.store');
Route::resource('/csv', CDRRecordController::class, '');