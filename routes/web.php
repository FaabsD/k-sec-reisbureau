<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getStedentripsApi;
use App\Http\Controllers\getStedentrips;

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

Route::get('/', function () {
    return view('welcome');
});

// API route
Route::prefix('api')->group(function () {
    Route::post('/getStedentripsAPI', getStedentripsApi::class)
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name('stedentripsAPI');
});

Route::get('/getStedentrips', [getStedentrips::class, 'index'])->name('stedentrips');
