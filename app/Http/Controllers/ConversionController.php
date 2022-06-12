<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class ConversionController extends Controller
{
    public function index() {

        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();

        return view('conversion.index')->with([
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request) {
    
        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();

        return view('conversion.index')->with([
            'currencies' => $currencies,
            'request' => $request->post()
        ]);    
    }


}
