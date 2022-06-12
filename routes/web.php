<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\PredictionController;


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
Route::post('/', [ExchangeRateController::class, 'store']);

Route::get('/conversion', [ConversionController::class, 'index']);
Route::post('/conversion', [ConversionController::class, 'store']);

Route::get('/prediction', [PredictionController::class, 'index']);
Route::post('/prediction', [PredictionController::class, 'store']);


Route::get('/test', [TestController::class, 'test']);

