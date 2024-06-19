<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return 'Hello World';
//});

Auth::routes();

Route::get('{page?}', [IndexController::class, 'index'])->name('home')->where('page', '[\/\w\.-]*');
