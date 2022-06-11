<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExchangeRateGetter;

class ConversionController extends Controller
{
    public function __construct(
        private ExchangeRateGetter $exchangeRateGetter
    ) {}

    public function index() {

        $currencies = $this->exchangeRateGetter->get();

        return view('conversion.index')->with([
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request) {
    
        $currencies = $this->exchangeRateGetter->get();

        return view('conversion.index')->with([
            'currencies' => $currencies,
            'request' => $request->post()
        ]);    
    }


}
