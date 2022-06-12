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

        // ARCHIVE EXCHANGE RATES    
        // $archiveCurrencies = $this->exchangeRateGetter->getArchives();
        
        // $month = 6;
        // $day = 10;
        // $calculate = 0;
        // foreach ($archiveCurrencies as $currency) {
        //     ExchangeRate::insert([
        //         "date" => '2022-'.$month.'-'.$day,
        //         "currency_from" => $currency['currency_from'],
        //         "currency_to" => $currency['currency_to'],
        //         "nominal" => $currency['nominal'],
        //         "value" => $currency['value']
        //     ]);
            
        //     $calculate++;

        //     if($calculate == 5) {
        //         $day--;
        //         $calculate = 0;
        //     }
        //     if($day == 0) {
        //         $month = 5;
        //         $day = 31;
        //     }
        // }

    }
}