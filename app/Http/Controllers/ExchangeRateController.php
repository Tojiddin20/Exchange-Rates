<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Services\RatePredictionCalcutator;
use Carbon\Carbon;

class ExchangeRateController extends Controller
{
    public function __construct(
    private RatePredictionCalcutator $ratePredictionCalcutator
    ) {}

    public function index() {
        
        $exchangeRate = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->paginate(30);
        $currencies = ExchangeRate::distinct('currency_from')->pluck('currency_from');

        return view('index')->with([
            'exchangeRate' => $exchangeRate,
            'currencies' => $currencies
        ]);
    }

    public function load() {
       
        $exchangeRate = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->paginate(30);
        $currencies = ExchangeRate::distinct('currency_from')->pluck('currency_from');
        $eur = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'EUR')->paginate(30);
        $kzt = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'KZT')->paginate(30);
        $tjs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'TJS')->paginate(30);
        $usd = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'USD')->paginate(30);
        $uzs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'UZS')->paginate(30);
       
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

    public function conversionIndex() {

        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();

        return view('conversion.index')->with([
            'currencies' => $currencies
        ]);
    }

    public function conversionLoad() {
    
        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();

        return view('conversion.index')->with([
            'currencies' => $currencies,
        ]);    
    }

      public function convertIndex() {

        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();
        $prediction = $this->ratePredictionCalcutator->get();
        $carbon = carbon::tomorrow();

        return view('prediction.index')->with([
            'currencies' => $currencies,
            'prediction' => $prediction,
            'carbon' => $carbon
        ]);
    }

    public function convertLoad() {

        $currencies = ExchangeRate::orderBy('date', 'desc')->orderBy('currency_from', 'asc')->take(5)->get();
        $prediction = $this->ratePredictionCalcutator->get();
        $carbon = now()->addDay();

        return view('prediction.index')->with([
            'currencies' => $currencies,
            'prediction' => $prediction,
            'carbon' => $carbon
        ]); 
    }


}