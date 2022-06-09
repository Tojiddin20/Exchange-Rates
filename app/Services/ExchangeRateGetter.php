<?php  
namespace App\Services;

class ExchangeRateGetter {
	public function get() {
		
	/// Receive JSON exchange rates
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

    /// Change Data Type to array
    $data = json_decode($path, true);

    /// Receive all currencies
    $valute = $data['Valute'];


    /// Receive the last archive of all exchange rates
   	$archive = [json_decode(file_get_contents('https:'.$data['PreviousURL']), true)];

   	// Var 1
	for ($i = 0; $i < 30; $i++) { 
		// Receive the last 30 archives of all exchange rates
		if ($i > 0){
			$archive[$i] = json_decode(file_get_contents('https:'.$archive[$i-1]['PreviousURL']), true);
		}
		// Receive the last 30 archives of usd exchange rates
		$usd[$i] = $archive[$i]['Valute']['USD'];
	}

	// Var 2
	// // Receive the last 30 archives of all exchange rates
	// for ($i = 1; $i  < 30; $i++) { 
	// 	$archive[$i] = json_decode(file_get_contents('https:'.$archive[$i-1]['PreviousURL']), true);
	// }

	// // Receive the last 30 archives of usd exchange rates
	// for ($i = 0; $i  < 30; $i++) { 
	// 	$usd[$i] = $archive[$i]['Valute']['USD'];
	// }	


	// Connect to db
	$connect = pg_connect('host=localhost port=5432 dbname=laravel user=postgres password=12345');

	foreach ($valute as $currency) {
		$sql = "INSERT INTO exchange_rates(code, name_of_currency, nominal, value) 
		VALUES ('".$currency["CharCode"]."', '".$currency["Name"]."', 
		'".$currency["Nominal"]."', '".$currency["Value"]."' )";
		pg_query($connect ,$sql);
	}

	foreach ($usd as $us) {
		$query = "INSERT INTO usd_archives(code, nominal, value) 
		VALUES ('".$us["CharCode"]."', '".$us["Nominal"]."', '".$us["Value"]."')";
		pg_query($connect ,$query);
	}


}
}