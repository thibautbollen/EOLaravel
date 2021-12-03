<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Controllers\HomeController::class
);
Route::get('/About', App\Http\Controllers\aboutController::class
);
Route::get('/Members', App\Http\Controllers\membersController::class
);
Route::get('/News', App\Http\Controllers\newsController::class
);
Route::get('/Contact', App\Http\Controllers\contactController::class
);
Route::get('/Disciplines', App\Http\Controllers\disciplinesController::class
);
Route::get('/disciplines/{title}', App\Http\Controllers\DiscliplineDetailsController::class
);
Route::get('/news/{publishDate}', App\Http\Controllers\NewsArticleController::class
);
Route::get('/members', \App\Http\Controllers\membersController::class
);
