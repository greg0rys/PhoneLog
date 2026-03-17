<?php

use App\Http\Controllers\CDRRecordController;
use App\Http\Controllers\CSVWorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-csv', [CSVWorkerController::class, 'show'])->name('csv.show');
Route::post('/upload-csv', [CSVWorkerController::class, 'store'])->name('csv.store');

Route::resource('/csv', CSVWorkerController::class);


// post / get methods above this line for form management
Route::resource('/cdr', CDRRecordController::class);