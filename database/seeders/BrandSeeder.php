<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Toyota',     'slug' => 'toyota'],
            ['name' => 'Mitsubishi', 'slug' => 'mitsubishi'],
            ['name' => 'Suzuki',     'slug' => 'suzuki'],
            ['name' => 'Lexus',      'slug' => 'lexus'],
            ['name' => 'Nissan',     'slug' => 'nissan'],
            ['name' => 'Otras marcas', 'slug' => 'otras-marcas'],
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate(['slug' => $brand['slug']], $brand);
        }
    }
}
