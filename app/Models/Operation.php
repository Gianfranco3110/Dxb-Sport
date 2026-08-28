<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['type', 'url', 'caption', 'category', 'active'];

    public static function categoryLabel(string $category): string
    {
        return match ($category) {
            'inspection'   => 'Inspecciones',
            'vehicles'     => 'Vehículos',
            'loading'      => 'Carga',
            'containers'   => 'Contenedores',
            'sealing'      => 'Sellado en puerto',
            'shipping'     => 'Embarques',
            'delivery'     => 'Entregas',
            'testimonials' => 'Testimonios',
            'team'         => 'Equipo',
            default        => $category,
        };
    }
}
