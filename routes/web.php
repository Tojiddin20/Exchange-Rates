<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\TestController;


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
Route::post('/', [ExchangeRateController::class, 'load']);

Route::get('/conversion', [ExchangeRateController::class, 'conversionIndex']);
Route::post('/conversion', [ExchangeRateController::class, 'conversionLoad']);

Route::get('/prediction', [ExchangeRateController::class, 'convertIndex']);
Route::post('/prediction', [ExchangeRateController::class, 'convertLoad']);


Route::get('/test', [TestController::class, 'test']);

