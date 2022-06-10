<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ConversionController;


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

Route::get('/', [ExchangeRateController::class, 'index']);

Route::get('/conversion', [ConversionController::class, 'index']);
Route::post('/conversion', [ConversionController::class, 'submit']);

Route::get('/prediction', function () {
	return view('prediction.index');
});

Route::get('/test', [TestController::class, 'test']);

