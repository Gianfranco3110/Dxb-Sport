<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $fillable = [
        'brand_id', 'model', 'year', 'version', 'engine',
        'transmission', 'origin_country', 'availability', 'images', 'active', 'estatus',
    ];

    protected $casts = [
        'images' => 'array',
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Vehicle $vehicle) {
            // Mantener active sincronizado con estatus para compatibilidad
            if ($vehicle->isDirty('estatus')) {
                $vehicle->active = $vehicle->estatus === 'activo';
            } elseif ($vehicle->isDirty('active')) {
                $vehicle->estatus = $vehicle->active ? 'activo' : 'inactivo';
            }
            // Valores permitidos
            if (!in_array($vehicle->estatus, ['activo', 'inactivo'], true)) {
                $vehicle->estatus = 'activo';
            }
        });
    }

    public function scopeActivo($query)
    {
        return $query->where('estatus', 'activo');
    }

    public function scopeInactivo($query)
    {
        return $query->where('estatus', 'inactivo');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function getAvailabilityLabelAttribute(): string
    {
        return match ($this->availability) {
            'available'  => 'Disponible',
            'on_request' => 'Bajo pedido',
            'sold'       => 'Vendido',
            default      => 'Consultar',
        };
    }
}
