<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class TestController extends Controller
{
    public function test() {
        ExchangeRate::insert([
            "day" => '2022-06-10',
            "currency_from" => 'ss',
            "currency_to" => 'aa',
            "nominal" => 1,
            "value" => 11
        ]);
    }
}
