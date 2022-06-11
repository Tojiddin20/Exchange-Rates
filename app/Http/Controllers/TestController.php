<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use App\Services\ExchangeRateGetter;

class TestController extends Controller
{
    public function __construct(
        private ExchangeRateGetter $exchangeRateGetter
    ) {}

    public function test() {
        return $this->exchangeRateGetter->getArchives();
    }
}
