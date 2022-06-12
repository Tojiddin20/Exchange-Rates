<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PredictionGetter;

class PredictionController extends Controller
{
    public function __construct(
        private PredictionGetter $predictionGetter
    ) {}

    public function index() {
        $arrayOfAllPeriouds = $this->predictionGetter->get();
        $month = $arrayOfAllPeriouds[2];
        $week = $arrayOfAllPeriouds[1];
        $day = $arrayOfAllPeriouds[0];
        
        return view('prediction.index')->with([
            'month' => $month,
            'week' => $week,
            'day' => $day
        ]);
    }

    public function store(Request $request) {
        $arrayOfAllPeriouds = $this->predictionGetter->get();
        $month = $arrayOfAllPeriouds[2];
        $week = $arrayOfAllPeriouds[1];
        $day = $arrayOfAllPeriouds[0];
        
        return view('prediction.index')->with([
            'month' => $month,
            'week' => $week,
            'day' => $day
        ]);   
    }
}
