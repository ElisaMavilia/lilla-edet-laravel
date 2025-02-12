<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;
use Illuminate\Support\Facades\File;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path(env('JSON_PRICE', 'database/data/prices.json')));
        $priceslista = json_decode($json);
        foreach ($priceslista as $price) {
        /* dd($price);  */
            Price::create([
                'name' => $price->name,
                'price' => $price->price,
            ]);
        }
    }
}
