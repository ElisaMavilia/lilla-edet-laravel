<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Treatment;
use Illuminate\Support\Facades\File;

class TreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path(env('JSON_TREATM', 'database/data/treatments.json')));
        $treatments = json_decode($json);
        foreach ($treatments as $treatment) {
            Treatment::create([
                'name' => $treatment->name,
                'description' => $treatment->description,
                'price' => $treatment->price,
                'image' => $treatment->image,
            ]);
        }
    }
}
