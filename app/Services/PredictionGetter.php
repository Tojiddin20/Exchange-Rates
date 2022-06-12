<?php  
namespace App\Services;

use App\Models\ExchangeRate;

class PredictionGetter {

	public function get() {
		// RECEIVE LAST 30 USD EXCHANGE RATES 
		$usd = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'USD')->take(30)->get();

		$step = 0;
		$sumOfDay = 0;
		$sumOfWeek = 0;
		$sumOfMonth = 0;

		// MAKE ARRAYS FOR 3 PERIODS
		foreach ($usd as $value) {
			$arrayOfMonth[$step] = $value->value;
			$sumOfMonth += $arrayOfMonth[$step];
			if ($step < 7) {
				$arrayOfDay[$step] = $value->value;
				$sumOfDay += $arrayOfDay[$step];
				$arrayOfWeek[$step] = $value->value;
				$sumOfWeek += $arrayOfWeek[$step];
			}
			$step++;
		}

		// REVERSE ARRAYS FOR CLARITY
		$arrayOfDay = array_reverse($arrayOfDay);
		$arrayOfWeek = array_reverse($arrayOfWeek);
		$arrayOfMonth = array_reverse($arrayOfMonth);

		// MAKE AND ALGORITH TO PREDICT EXCHANGE RATE FOR THE NEXT 30 DAYS
		$days = 6;
		for ($i = 0; $i < 30; $i++) { 
			if ($i <= 27) {
				if ($arrayOfMonth[$i] > $arrayOfMonth[$days]) {
					$predictMonth[$i] = $sumOfMonth - ($arrayOfMonth[$i] - $arrayOfMonth[$days]) * 30;
					$predictMonth[$i] /= 30;
					$predictMonth[$i] = number_format($predictMonth[$i] , 4);		
				} else {
					$predictMonth[$i] = $sumOfMonth + ($arrayOfMonth[$i] - $arrayOfMonth[$days]) * 30;
					$predictMonth[$i] /= 30;
					$predictMonth[$i] = number_format($predictMonth[$i] , 4);
				}
			}
			if ($i == $days) $days += 7;
			if ($i > 27) {
				for ($j = $i-7; $j < $i; $j++) { 
					$predictMonth[$i] = $sumOfMonth + ($arrayOfMonth[$j] - $arrayOfMonth[$i]) * 30;
					$predictMonth[$i] /= 30;
					$predictMonth[$i] = number_format($predictMonth[$i] , 4);
				}
			}
		}

		// MAKE AND ALGORITH TO PREDICT EXCHANGE RATE FOR THE NEXT WEEK
		for ($i = 0; $i < 7; $i++) { 
			if ($arrayOfWeek[$i] > $arrayOfWeek[6]) {
				$predictWeek[$i] = $sumOfWeek - ($arrayOfWeek[$i] - $arrayOfWeek[6]) * 7;
				$predictWeek[$i] /= 7;
				$predictWeek[$i] = number_format($predictWeek[$i] , 4)	;	
			} else {
				$predictWeek[$i] = $sumOfWeek + ($arrayOfWeek[$i] - $arrayOfWeek[6]) * 7;
				$predictWeek[$i] /= 7;
				$predictWeek[$i] = number_format($predictWeek[$i] , 4);
			}
		}		

		// MAKE AN ALGORITHM TO PREDICT EXCHANGE RATE FOR TOMORROW	
		if($arrayOfDay[0] < $arrayOfDay[6]) {
			$sumOfDay = $sumOfDay + ($arrayOfDay[6] - $arrayOfDay[0]) * 7;
			$sumOfDay /= 7;
		} else if($arrayOfDay[0] > $arrayOfDay[6]) {
			$sumOfDay = $sumOfDay - ($arrayOfDay[0] - $arrayOfDay[6]) * 7;
			$sumOfDay /= 7;
		}

		// CUT THE NUMBER
		$sumOfDay = number_format($sumOfDay , 4);

		$arrayOfAllPeriouds = [$sumOfDay, $predictWeek, $predictMonth];

		return $arrayOfAllPeriouds;
	}
}