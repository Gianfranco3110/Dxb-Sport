<?php

namespace Database\Seeders;

use App\Models\Operation;
use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    public function run(): void
    {
        $operations = [
            // Videos de carga
            [
                'type' => 'video',
                'url' => 'operations/loading/copy_37C2EC68-2B74-40AE-8D13-DC0E5DC41E82.MOV',
                'caption' => 'Maniobra de carga con montacargas',
                'category' => 'loading',
            ],
            [
                'type' => 'video',
                'url' => 'operations/loading/IMG_6229.MOV',
                'caption' => 'Estiba de vehículos para embarque',
                'category' => 'loading',
            ],
            // Fotos equipo - mismo grid, no video
            [
                'type' => 'photo',
                'url' => 'operations/team/F893E822-4DA4-4947-824E-2BE4F4C547EF.PNG',
                'caption' => 'Equipo DXB Exports',
                'category' => 'team',
            ],
            [
                'type' => 'photo',
                'url' => 'operations/team/IMG_6975.PNG',
                'caption' => 'Equipo DXB Exports',
                'category' => 'team',
            ],
        ];

        foreach ($operations as $op) {
            Operation::firstOrCreate(
                ['url' => $op['url']],
                $op
            );
        }
    }
}
