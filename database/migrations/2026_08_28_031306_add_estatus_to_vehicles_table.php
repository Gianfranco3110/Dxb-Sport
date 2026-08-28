<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            if (!Schema::hasColumn('vehicles', 'estatus')) {
                $table->string('estatus')->default('activo')->after('active')->index();
            }
        });

        // Backfill: todas activas por defecto
        \Illuminate\Support\Facades\DB::table('vehicles')->whereNull('estatus')->orWhere('estatus', '')->update(['estatus' => 'activo']);
        \Illuminate\Support\Facades\DB::table('vehicles')->where('estatus', 'activo')->update(['active' => true]);

        // Reglas pedidas: highlander inactivo, lexus solo lx activo
        $toyotaId = \Illuminate\Support\Facades\DB::table('brands')->where('slug', 'toyota')->value('id');
        $lexusId = \Illuminate\Support\Facades\DB::table('brands')->where('slug', 'lexus')->value('id');

        if ($toyotaId) {
            \Illuminate\Support\Facades\DB::table('vehicles')
                ->where('brand_id', $toyotaId)
                ->where('model', 'Highlander')
                ->update(['estatus' => 'inactivo', 'active' => false]);
            // Fallback por path images
            \Illuminate\Support\Facades\DB::table('vehicles')
                ->where('brand_id', $toyotaId)
                ->where('images', 'like', '%vehicles/toyota/highlander/%')
                ->update(['estatus' => 'inactivo', 'active' => false]);
        }

        if ($lexusId) {
            \Illuminate\Support\Facades\DB::table('vehicles')
                ->where('brand_id', $lexusId)
                ->where('model', '!=', 'LX')
                ->update(['estatus' => 'inactivo', 'active' => false]);
            \Illuminate\Support\Facades\DB::table('vehicles')
                ->where('brand_id', $lexusId)
                ->where('model', 'LX')
                ->update(['estatus' => 'activo', 'active' => true]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            if (Schema::hasColumn('vehicles', 'estatus')) {
                $table->dropColumn('estatus');
            }
        });
    }
};
