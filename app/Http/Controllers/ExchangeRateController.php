<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Services\ExchangeRateGetter;

class ExchangeRateController extends Controller
{

    public function __construct(
        private ExchangeRateGetter $exchangeRateGetter
    ) {}

    public function index() {
        
        $currencies = $this->exchangeRateGetter->get();
        $dollar = $this->exchangeRateGetter->archive();

        return view('index')->with([
            'currencies' => $currencies,
            'dollar' => $dollar
        ]);
    }
}
