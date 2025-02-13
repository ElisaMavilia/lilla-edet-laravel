<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path(env('JSON_GALL', 'database/data/galleries.json')));
        $galleries = json_decode($json);
        foreach ($galleries as $gallery) {
        /* dd($price);  */
            Gallery::create([
                'image' => $gallery->image,
                'description' => $gallery->description,
            ]);
        }
    }
}
