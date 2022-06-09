<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Models\UsdArchive;
use App\Services\ExchangeRateGetter;

class ExchangeRateController extends Controller
{

    public function __construct(
        private ExchangeRateGetter $exchangeRateGetter
    ) {}

    public function index() {
        
        // $currencies = $this->exchangeRateGetter->get();

        return view('index')->with([
            'usd' => UsdArchive::all(),
            'exchangeRate' => ExchangeRate::all()
        ]);
    }

    public function test() {
        dd("test");
    }
}
