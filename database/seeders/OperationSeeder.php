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
                'url' => 'operations/loading/83187734b4544af8b44b304189167351.MP4',
                'caption' => 'Carga de vehículos en contenedor - Dubái',
                'category' => 'loading',
            ],
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
            // Fotos de contenedores / carga
            [
                'type' => 'photo',
                'url' => 'operations/containers/28695839-6C5F-4D4E-ADBC-C26D52BF1E81.JPG',
                'caption' => 'Vehículos estibados en contenedor',
                'category' => 'containers',
            ],
            [
                'type' => 'photo',
                'url' => 'operations/containers/8A260E4A-A463-4605-B8DF-96AD7F54F335.JPG',
                'caption' => 'Inspección previa a carga',
                'category' => 'containers',
            ],
            [
                'type' => 'photo',
                'url' => 'operations/containers/D9C23390-AA76-41B1-9791-CCA019A9A364.JPG',
                'caption' => 'Contenedor listo para sellado en puerto',
                'category' => 'containers',
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
