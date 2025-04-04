<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Dentist;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dentist()
    {
        return $this->hasOne(Dentist::class);
    }
}
