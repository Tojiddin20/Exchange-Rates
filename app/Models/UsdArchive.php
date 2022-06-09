<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\ExchangeRateGetter;

class UsdArchive extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}