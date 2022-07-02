<?php  
namespace App\Services;

use App\Models\ExchangeRate;

class RatePredictionCalcutator {

	public function get() {
		// RECEIVE THE LAST 30 EXCHANGE RATES 
		$exchangeRatesOfEur = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'EUR')->take(30)->get();
		$exchangeRatesOfKzt = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'KZT')->take(30)->get();
		$exchangeRatesOfTjs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'TJS')->take(30)->get();
		$exchangeRatesOfUsd = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'USD')->take(30)->get();
		$exchangeRatesOfUzs = ExchangeRate::orderBy('date', 'desc')->where('currency_from', 'UZS')->take(30)->get();

		$sumOfEur = 0;
		$sumOfKzt = 0;
		$sumOfTjs = 0;
		$sumOfUsd = 0;
		$sumOfUzs = 0;

		// MAKE ARRAYS
		foreach ($exchangeRatesOfEur as $key => $value) {
			$arrayOfEur[$key] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfEur += $arrayOfEur[$key]['value'];
		}

		foreach ($exchangeRatesOfKzt as $key => $value) {
			$arrayOfKzt[$key] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfKzt += $arrayOfEur[$key]['value'];
		}

		foreach ($exchangeRatesOfTjs as $key => $value) {
			$arrayOfTjs[$key] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfTjs += $arrayOfTjs[$key]['value'];
		}

		foreach ($exchangeRatesOfUsd as $key => $value) {
			$arrayOfUsd[$key] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfUsd += $arrayOfUsd[$key]['value'];
		}

		foreach ($exchangeRatesOfUzs as $key => $value) {
			$arrayOfUzs[$key] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfUzs += $arrayOfUzs[$key]['value'];
		}

		// REVERSE ARRAY FOR CLARITY
		$arrayOfEur = array_reverse($arrayOfEur);
		$arrayOfKzt = array_reverse($arrayOfKzt);
		$arrayOfTjs = array_reverse($arrayOfTjs);
		$arrayOfUsd = array_reverse($arrayOfUsd);
		$arrayOfUzs = array_reverse($arrayOfUzs);

		// MAKE AN ALGORITH TO PREDICT EXCHANGE RATE FOR THE NEXT 30 DAYS
		foreach ($arrayOfEur as $key => $value) {
			$predictionEur[$key] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfEur - ($value['value'] - $arrayOfEur[29]['value']) / 2 * 30) / 30, 4)
			];
		}

		foreach ($arrayOfKzt as $key => $value) {
			$predictionKzt[$key] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfKzt - ($value['value'] - $arrayOfKzt[29]['value']) / 2 * 30) / 30, 4)
			];
		}

		foreach ($arrayOfTjs as $key => $value) {
			$predictionTjs[$key] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfTjs - ($value['value'] - $arrayOfTjs[29]['value']) / 2 * 30) / 30, 4)
			];
		}

		foreach ($arrayOfUsd as $key => $value) {
			$predictionUsd[$key] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfUsd - ($value['value'] - $arrayOfUsd[29]['value']) / 2 * 30) / 30, 4)
			];
		}

		foreach ($arrayOfUzs as $key => $value) {
			$predictionUzs[$key] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfUzs - ($value['value'] - $arrayOfUzs[29]['value']) / 2 * 30) / 30, 4)
			];
		}

		$prediction = [$predictionEur, $predictionKzt, $predictionTjs, $predictionUsd, $predictionUzs];

		return $prediction;

	}
}