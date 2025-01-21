<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dentist;
use Illuminate\Support\Str;

class Treatment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = 1;
        while (Treatment::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    protected static function boot()
    {
        parent::boot();

        // Evento per la creazione
        static::creating(function ($treatment) {
            if (empty($treatment->slug)) {
                $treatment->slug = self::generateSlug($treatment->name);
            }
        });

        // Evento per l'aggiornamento
        static::updating(function ($treatment) {
            if ($treatment->isDirty('name')) { // Rigenera lo slug solo se il nome cambia
                $treatment->slug = self::generateSlug($treatment->name);
            }
        });
    }

    public function dentists() 
    {
        return $this->belongsToMany(Dentist::class);
    }
}
