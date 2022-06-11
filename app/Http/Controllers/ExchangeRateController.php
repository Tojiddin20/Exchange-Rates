<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class ExchangeRateController extends Controller
{

    public function index() {
        
        $exchangeRate = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->paginate(30);

        return view('index')->with([
            'exchangeRate' => $exchangeRate
        ]);
    }
}