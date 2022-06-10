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
        $currencies = $this->exchangeRateGetter->get();
        // $archiveCurrencies = $this->exchangeRateGetter->getArchives();

        foreach ($currencies as $currency) {
            ExchangeRate::insert([
                "day" => $currency['day'],
                "currency_from" => $currency['currency_from'],
                "currency_to" => $currency['currency_to'],
                "nominal" => $currency['nominal'],
                "value" => $currency['value']
            ]);
        }


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}