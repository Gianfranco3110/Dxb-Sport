<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'Toyota',     'slug' => 'toyota',     'logo' => 'brands/toyota.png'],
            ['name' => 'Mitsubishi', 'slug' => 'mitsubishi', 'logo' => 'brands/mitsubishi.png'],
            ['name' => 'Suzuki',     'slug' => 'suzuki',     'logo' => 'brands/suzuki.png'],
            ['name' => 'Lexus',      'slug' => 'lexus',      'logo' => 'brands/lexus.png'],
            ['name' => 'Nissan',     'slug' => 'nissan',     'logo' => 'brands/nissan.png'],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(['slug' => $brand['slug']], $brand);
        }
    }
}
