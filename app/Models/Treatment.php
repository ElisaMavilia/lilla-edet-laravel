<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dentist;

class Treatment extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function dentists() 
    {
        return $this->belongsToMany(Dentist::class);
    }
}
