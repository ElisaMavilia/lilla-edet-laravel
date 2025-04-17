<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['price_formatted'];

    public function getPriceFormattedAttribute()
    {
        return rtrim(rtrim(number_format($this->price, 2, '.', ''), '0'), '.');
    }
}
