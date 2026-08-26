<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $fillable = [
        'brand_id', 'model', 'year', 'version', 'engine',
        'transmission', 'origin_country', 'availability', 'images', 'active',
    ];

    protected $casts = [
        'images' => 'array',
    ];

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
