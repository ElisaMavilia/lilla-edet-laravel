<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dentist;
use Illuminate\Support\Facades\File;

class DentistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/dentists.json');
        $dentists = json_decode($json);
        foreach ($dentists as $dentist) {
            Dentist::create([
               'specialization' => $dentist->specialization,
                'employee_id' => $dentist->employee_id
            ]);
        }
    }
}
