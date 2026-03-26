<?php

use App\Http\Controllers\CDRRecordController;
use App\Http\Controllers\ParserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload-csv', [ParserController::class, 'store']);
Route::resource('/parse', ParserController::class);

Route::get('/cdr/number_search', [CDRRecordController::class, 'search_by_number']);
// post / get methods above this line for form management
Route::resource('/cdr', CDRRecordController::class);
