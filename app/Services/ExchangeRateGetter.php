<?php  
namespace App\Services;

class ExchangeRateGetter {
	public function get() {
		
		/// RECEIVE JSON TODAY'S EXCHANGE RATES
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

	    /// CHANGE DATA TYPE TO ARRAY
	    $data = json_decode($path, true);

	    /// RECEIVE ALL CURRENCIES
	    $valute = $data['Valute'];
	    $date = $data['Date'];

	    // SELECT REQUIRED CURRENCIES
	    foreach ($valute as $currencyCode => $v) {
	    	if(in_array($currencyCode, ['TJS', 'USD', 'EUR', 'UZS', 'KZT'])) {
	    		$currencies[] = [
					"day" => $date,
					"currency_from" => $currencyCode,
					"currency_to" => 'RUB',
					"nominal" => $v['Nominal'],
					"value" => $v['Value']
	    		]; 
	    	}
	    }

	    return $currencies;
}
	// public function getArchives() {
	/// RECEIVE JSON TODAY'S EXCHANGE RATES
	// 	$arrContextOptions = [
 //            "ssl" => [
 //                "verify_peer" => false,
 //                "verify_peer_name" => false,
 //            ],
 //        ];

 //    $path = file_get_contents(
 //    	"https://www.cbr-xml-daily.ru/daily_json.js", 
 //    	false, 
 //    	stream_context_create($arrContextOptions)
 //    );

 //    /// CHANGE DATA TYPE TO ARRAY
 //    $data = json_decode($path, true);

 //        /// RECEIVE 1 ARCHIVE OF ALL EXCHANGE RATES
 //   	$archive = [json_decode(file_get_contents('https:'.$data['PreviousURL']), true)];

	// // RECEIVE 30 ARCHIVES OF ALL EXCHANGE RATES
	// for ($i = 1; $i  < 30; $i++) { 
	// 	$archive[$i] = json_decode(file_get_contents('https:'.$archive[$i-1]['PreviousURL']), true);
	// }


	// // SELECT REQUIRED ARCHIVE CURRENCIES 

	// foreach ($archive as $value) {
	// 	$archiveArray[] = $value['Valute'];
	// 	$archiveDate[] = $value['Date'];
	// }

	// $i = 0;
	// foreach ($archiveArray as $value) {
	// 	foreach ($value as $currencyCode => $v) {
	// 		if(in_array($currencyCode, ['TJS', 'USD', 'EUR', 'UZS', 'KZT'])) {
	// 			$archiveCurrencies[] = [
	// 				"day" => $archiveDate[$i],
	// 				"currency_from" => $currencyCode,
	// 				"currency_to" => 'RUB',
	// 				"nominal" => $v['Nominal'],
	// 				"value" => $v['Value']
	//     		]; 
	// 		}	
	// 	}
	// 	$i++;
	// }
	// dd($archiveCurrencies);
	// return $archiveCurrencies;
	// }

}