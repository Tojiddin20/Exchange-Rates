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
		$step = 0;
		foreach ($exchangeRatesOfEur as $value) {
			$arrayOfEur[$step] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfEur += $arrayOfEur[$step]['value'];
			$step++;
		}

		$step = 0;
		foreach ($exchangeRatesOfKzt as $value) {
			$arrayOfKzt[$step] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfKzt += $arrayOfEur[$step]['value'];
			$step++;
		}

		$step = 0;
		foreach ($exchangeRatesOfTjs as $value) {
			$arrayOfTjs[$step] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfTjs += $arrayOfTjs[$step]['value'];
			$step++;
		}

		$step = 0;
		foreach ($exchangeRatesOfUsd as $value) {
			$arrayOfUsd[$step] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfUsd += $arrayOfUsd[$step]['value'];
			$step++;
		}

		$step = 0;
		foreach ($exchangeRatesOfUzs as $value) {
			$arrayOfUzs[$step] = [
				'currency_from' => $value->currency_from,
				'nominal' => $value->nominal,
				'value' => $value->value
			];
			$sumOfUzs += $arrayOfUzs[$step]['value'];
			$step++;
		}

		// REVERSE ARRAY FOR CLARITY
		$arrayOfEur = array_reverse($arrayOfEur);
		$arrayOfKzt = array_reverse($arrayOfKzt);
		$arrayOfTjs = array_reverse($arrayOfTjs);
		$arrayOfUsd = array_reverse($arrayOfUsd);
		$arrayOfUzs = array_reverse($arrayOfUzs);

		// MAKE AN ALGORITH TO PREDICT EXCHANGE RATE FOR THE NEXT 30 DAYS
		$step = 0;
		foreach ($arrayOfEur as $value) {
			$predictionEur[$step] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfEur - ($value['value'] - $arrayOfEur[29]['value']) / 2 * 30) / 30, 4)
			];
			$step++;
		}

		$step = 0;
		foreach ($arrayOfKzt as $value) {
			$predictionKzt[$step] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfKzt - ($value['value'] - $arrayOfKzt[29]['value']) / 2 * 30) / 30, 4)
			];
			$step++;
		}

		$step = 0;
		foreach ($arrayOfTjs as $value) {
			$predictionTjs[$step] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfTjs - ($value['value'] - $arrayOfTjs[29]['value']) / 2 * 30) / 30, 4)
			];
			$step++;
		}

		$step = 0;
		foreach ($arrayOfUsd as $value) {
			$predictionUsd[$step] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfUsd - ($value['value'] - $arrayOfUsd[29]['value']) / 2 * 30) / 30, 4)
			];
			$step++;
		}

		$step = 0;
		foreach ($arrayOfUzs as $value) {
			$predictionUzs[$step] = [
				'currency_from' => $value['currency_from'],
				'nominal' => $value['nominal'],
				'value' => number_format(($sumOfUzs - ($value['value'] - $arrayOfUzs[29]['value']) / 2 * 30) / 30, 4)
			];
			$step++;
		}

		$prediction = [$predictionEur, $predictionKzt, $predictionTjs, $predictionUsd, $predictionUzs];

		return $prediction;

	}
}