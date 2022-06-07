<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class RatesController extends Controller
{
    public function index() {
        
     $arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$path = file_get_contents("https://www.cbr-xml-daily.ru/daily_json.js", false, stream_context_create($arrContextOptions));

$data = json_decode($path, true);

$currencies = [
'AZN' => [
    'code' => $data['Valute']['AZN']['CharCode'],
    'name' => $data['Valute']['AZN']['Name'],
    'nominal' => $data['Valute']['AZN']['Nominal'],
    'value' => $data['Valute']['AZN']['Value']
],
'AMD' => [
    'code' => $data['Valute']['AMD']['CharCode'],
    'name' => $data['Valute']['AMD']['Name'],
    'nominal' => $data['Valute']['AMD']['Nominal'],
    'value' => $data['Valute']['AMD']['Value']
],
'USD' => [
    'code' => $data['Valute']['USD']['CharCode'],
    'name' => $data['Valute']['USD']['Name'],
    'nominal' => $data['Valute']['USD']['Nominal'],
    'value' => $data['Valute']['USD']['Value']
],
'EUR' => [
    'code' => $data['Valute']['EUR']['CharCode'],
    'name' => $data['Valute']['EUR']['Name'],
    'nominal' => $data['Valute']['EUR']['Nominal'],
    'value' => $data['Valute']['EUR']['Value']
],
'KZT' => [
    'code' => $data['Valute']['KZT']['CharCode'],
    'name' => $data['Valute']['KZT']['Name'],
    'nominal' => $data['Valute']['KZT']['Nominal'],
    'value' => $data['Valute']['KZT']['Value']
],
'KGS' => [
    'code' => $data['Valute']['KGS']['CharCode'],
    'name' => $data['Valute']['KGS']['Name'],
    'nominal' => $data['Valute']['KGS']['Nominal'],
    'value' => $data['Valute']['KGS']['Value']
],
'CNY' => [
    'code' => $data['Valute']['CNY']['CharCode'],
    'name' => $data['Valute']['CNY']['Name'],
    'nominal' => $data['Valute']['CNY']['Nominal'],
    'value' => $data['Valute']['CNY']['Value']
],
'TJS' => [
    'code' => $data['Valute']['TJS']['CharCode'],
    'name' => $data['Valute']['TJS']['Name'],
    'nominal' => $data['Valute']['TJS']['Nominal'],
    'value' => $data['Valute']['TJS']['Value']
],
'TRY' => [
    'code' => $data['Valute']['TRY']['CharCode'],
    'name' => $data['Valute']['TRY']['Name'],
    'nominal' => $data['Valute']['TRY']['Nominal'],
    'value' => $data['Valute']['TRY']['Value']
],
'UZS' => [
    'code' => $data['Valute']['UZS']['CharCode'],
    'name' => $data['Valute']['UZS']['Name'],
    'nominal' => $data['Valute']['UZS']['Nominal'],
    'value' => $data['Valute']['UZS']['Value']
]
];
        return view('index')->with(['currencies' => $currencies]);
    }
}
