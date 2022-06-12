<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use Carbon\Carbon;

class ExchangeRateController extends Controller
{

    public function index() {
        
        $exchangeRate = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->paginate(30);
        $currencies = ExchangeRate::distinct('currency_from')->pluck('currency_from');

        return view('index')->with([
            'exchangeRate' => $exchangeRate,
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request) {
        $exchangeRate = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->paginate(30);
        $eur = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'EUR')->paginate(30);
        $kzt = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'KZT')->paginate(30);
        $tjs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'TJS')->paginate(30);
        $usd = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'USD')->paginate(30);
        $uzs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'UZS')->paginate(30);
        $currencies = ExchangeRate::distinct('currency_from')->pluck('currency_from');
        return view('index')->with([
            'exchangeRate' => $exchangeRate,
            'currencies' => $currencies,
            'eur' => $eur,
            'kzt' => $kzt,
            'tjs' => $tjs,
            'usd' => $usd,
            'uzs' => $uzs
        ]);

    }
}