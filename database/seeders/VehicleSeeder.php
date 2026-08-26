<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vehicles = [
            [
                'brand'          => 'toyota',
                'model'          => 'Land Cruiser',
                'year'           => 2024,
                'version'        => 'GXR V8',
                'engine'         => '4.5L V8 Diesel',
                'transmission'   => 'Automática',
                'origin_country' => 'Japón',
                'availability'   => 'on_request',
                'images'         => [],
            ],
            [
                'brand'          => 'toyota',
                'model'          => 'Hilux',
                'year'           => 2024,
                'version'        => 'SR5 4x4',
                'engine'         => '2.8L Diesel',
                'transmission'   => 'Automática',
                'origin_country' => 'Tailandia',
                'availability'   => 'on_request',
                'images'         => [],
            ],
            [
                'brand'          => 'mitsubishi',
                'model'          => 'Pajero',
                'year'           => 2024,
                'version'        => 'GLS',
                'engine'         => '3.8L V6',
                'transmission'   => 'Automática',
                'origin_country' => 'Japón',
                'availability'   => 'on_request',
                'images'         => [],
            ],
            [
                'brand'          => 'nissan',
                'model'          => 'Patrol',
                'year'           => 2024,
                'version'        => 'SE Platinum',
                'engine'         => '5.6L V8',
                'transmission'   => 'Automática',
                'origin_country' => 'Emiratos Árabes Unidos',
                'availability'   => 'on_request',
                'images'         => [],
            ],
            [
                'brand'          => 'lexus',
                'model'          => 'LX 600',
                'year'           => 2024,
                'version'        => 'F Sport',
                'engine'         => '3.5L V6 Twin Turbo',
                'transmission'   => 'Automática',
                'origin_country' => 'Japón',
                'availability'   => 'on_request',
                'images'         => [],
            ],
            [
                'brand'          => 'suzuki',
                'model'          => 'Jimny',
                'year'           => 2024,
                'version'        => 'GLX',
                'engine'         => '1.5L',
                'transmission'   => 'Manual',
                'origin_country' => 'India',
                'availability'   => 'on_request',
                'images'         => [],
            ],
        ];

        foreach ($vehicles as $data) {
            $brand = Brand::where('slug', $data['brand'])->first();
            if (!$brand) continue;

            Vehicle::firstOrCreate(
                ['brand_id' => $brand->id, 'model' => $data['model'], 'year' => $data['year']],
                [
                    'version'        => $data['version'],
                    'engine'         => $data['engine'],
                    'transmission'   => $data['transmission'],
                    'origin_country' => $data['origin_country'],
                    'availability'   => $data['availability'],
                    'images'         => $data['images'],
                ]
            );
        }
    }
}
