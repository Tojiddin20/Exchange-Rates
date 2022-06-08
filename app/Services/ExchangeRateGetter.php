<?php  
namespace App\Services;

class ExchangeRateGetter {
	public function get() {
		$arrContextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

    $path = file_get_contents(
    	"https://www.cbr-xml-daily.ru/daily_json.js", 
    	false, 
    	stream_context_create($arrContextOptions)
    );

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

	return $currencies;
}
	
	public function archive() {
	$arrContextOptions = [
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ],
    ];

    $path = file_get_contents(
    	"https://www.cbr-xml-daily.ru/daily_json.js", 
    	false, 
    	stream_context_create($arrContextOptions)
    );

    $data = json_decode($path, true);

	$data1 = json_decode(file_get_contents('https:'.$data['PreviousURL']), true);
	$data2 = json_decode(file_get_contents('https:'.$data1['PreviousURL']), true);
	$data3 = json_decode(file_get_contents('https:'.$data2['PreviousURL']), true);
	$data4 = json_decode(file_get_contents('https:'.$data3['PreviousURL']), true);
	$data5 = json_decode(file_get_contents('https:'.$data4['PreviousURL']), true);
	$data6 = json_decode(file_get_contents('https:'.$data5['PreviousURL']), true);
	$data7 = json_decode(file_get_contents('https:'.$data6['PreviousURL']), true);
	$data8 = json_decode(file_get_contents('https:'.$data7['PreviousURL']), true);
	$data9 = json_decode(file_get_contents('https:'.$data8['PreviousURL']), true);
	$data10 = json_decode(file_get_contents('https:'.$data9['PreviousURL']), true);
	$data11 = json_decode(file_get_contents('https:'.$data10['PreviousURL']), true);
	$data12 = json_decode(file_get_contents('https:'.$data11['PreviousURL']), true);
	$data13 = json_decode(file_get_contents('https:'.$data12['PreviousURL']), true);
	$data14 = json_decode(file_get_contents('https:'.$data13['PreviousURL']), true);
	$data15 = json_decode(file_get_contents('https:'.$data14['PreviousURL']), true);
	$data16 = json_decode(file_get_contents('https:'.$data15['PreviousURL']), true);
	$data17 = json_decode(file_get_contents('https:'.$data16['PreviousURL']), true);
	$data18 = json_decode(file_get_contents('https:'.$data17['PreviousURL']), true);
	$data19 = json_decode(file_get_contents('https:'.$data18['PreviousURL']), true);
	$data20 = json_decode(file_get_contents('https:'.$data19['PreviousURL']), true);
	$data21 = json_decode(file_get_contents('https:'.$data20['PreviousURL']), true);
	$data22 = json_decode(file_get_contents('https:'.$data21['PreviousURL']), true);
	$data23 = json_decode(file_get_contents('https:'.$data22['PreviousURL']), true);
	$data24 = json_decode(file_get_contents('https:'.$data23['PreviousURL']), true);
	$data25 = json_decode(file_get_contents('https:'.$data24['PreviousURL']), true);
	$data26 = json_decode(file_get_contents('https:'.$data25['PreviousURL']), true);
	$data27 = json_decode(file_get_contents('https:'.$data26['PreviousURL']), true);
	$data28 = json_decode(file_get_contents('https:'.$data27['PreviousURL']), true);
	$data29 = json_decode(file_get_contents('https:'.$data28['PreviousURL']), true);
	$data30 = json_decode(file_get_contents('https:'.$data29['PreviousURL']), true);

	$currencies = [
		$d1 = $data1['Valute']['USD'],
		$d2 = $data2['Valute']['USD'],
		$d3 = $data3['Valute']['USD'],
		$d4 = $data4['Valute']['USD'],
		$d5 = $data5['Valute']['USD'],
		$d6 = $data6['Valute']['USD'],
		$d7 = $data7['Valute']['USD'],
		$d8 = $data8['Valute']['USD'],
		$d9 = $data9['Valute']['USD'],
		$d10 = $data10['Valute']['USD'],
		$d11 = $data11['Valute']['USD'],
		$d12 = $data12['Valute']['USD'],
		$d13 = $data13['Valute']['USD'],
		$d14 = $data14['Valute']['USD'],
		$d15 = $data15['Valute']['USD'],
		$d16 = $data16['Valute']['USD'],
		$d17 = $data17['Valute']['USD'],
		$d18 = $data18['Valute']['USD'],
		$d19 = $data19['Valute']['USD'],
		$d20 = $data20['Valute']['USD'],
		$d21 = $data21['Valute']['USD'],
		$d22 = $data22['Valute']['USD'],
		$d23 = $data23['Valute']['USD'],
		$d24 = $data24['Valute']['USD'],
		$d25 = $data25['Valute']['USD'],
		$d26 = $data26['Valute']['USD'],
		$d27 = $data27['Valute']['USD'],
		$d28 = $data28['Valute']['USD'],
		$d29 = $data29['Valute']['USD'],
		$d30 = $data30['Valute']['USD']
	];
    return $currencies;
	}

}