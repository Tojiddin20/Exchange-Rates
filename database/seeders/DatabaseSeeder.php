<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExchangeRate;
use App\Services\ExchangeRateGetter;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function __construct(
        private ExchangeRateGetter $exchangeRateGetter
    ) {}

    public function run()
    {

    // RECEIVE AND SEED FRESH EXCHANGE RATES
        $currencies = $this->exchangeRateGetter->get();

        foreach ($currencies as $currency) {
            ExchangeRate::insert([
                "date" => date("Y-m-d"),
                "currency_from" => $currency['currency_from'],
                "currency_to" => $currency['currency_to'],
                "nominal" => $currency['nominal'],
                "value" => $currency['value']
            ]);
        }

    }
}