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
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE operations MODIFY category ENUM('inspection','vehicles','loading','containers','sealing','shipping','delivery','testimonials','team') DEFAULT 'vehicles'");
        } elseif ($driver === 'sqlite') {
            // SQLite: recrear tabla con nuevo CHECK incluyendo 'team'
            \Illuminate\Support\Facades\DB::statement('CREATE TABLE operations_new (id INTEGER PRIMARY KEY AUTOINCREMENT, type VARCHAR NOT NULL CHECK(type IN (\'photo\',\'video\')) DEFAULT \'photo\', url VARCHAR NOT NULL, caption VARCHAR, category VARCHAR NOT NULL CHECK(category IN (\'inspection\',\'vehicles\',\'loading\',\'containers\',\'sealing\',\'shipping\',\'delivery\',\'testimonials\',\'team\')) DEFAULT \'vehicles\', active TINYINT(1) NOT NULL DEFAULT 1, created_at DATETIME, updated_at DATETIME)');
            \Illuminate\Support\Facades\DB::statement('INSERT INTO operations_new (id, type, url, caption, category, active, created_at, updated_at) SELECT id, type, url, caption, category, active, created_at, updated_at FROM operations');
            \Illuminate\Support\Facades\DB::statement('DROP TABLE operations');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE operations_new RENAME TO operations');
        } else {
            // Fallback pgsql etc: change to string
            Schema::table('operations', function (Blueprint $table) {
                // No-op, se manejará via seeder con validación en modelo
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE operations MODIFY category ENUM('inspection','vehicles','loading','containers','sealing','shipping','delivery','testimonials') DEFAULT 'vehicles'");
            \Illuminate\Support\Facades\DB::table('operations')->where('category', 'team')->update(['category' => 'vehicles']);
        } elseif ($driver === 'sqlite') {
            \Illuminate\Support\Facades\DB::statement('CREATE TABLE operations_new (id INTEGER PRIMARY KEY AUTOINCREMENT, type VARCHAR NOT NULL CHECK(type IN (\'photo\',\'video\')) DEFAULT \'photo\', url VARCHAR NOT NULL, caption VARCHAR, category VARCHAR NOT NULL CHECK(category IN (\'inspection\',\'vehicles\',\'loading\',\'containers\',\'sealing\',\'shipping\',\'delivery\',\'testimonials\')) DEFAULT \'vehicles\', active TINYINT(1) NOT NULL DEFAULT 1, created_at DATETIME, updated_at DATETIME)');
            \Illuminate\Support\Facades\DB::statement('INSERT INTO operations_new (id, type, url, caption, category, active, created_at, updated_at) SELECT id, type, url, caption, category, active, created_at, updated_at FROM operations WHERE category != \'team\'');
            \Illuminate\Support\Facades\DB::statement('DROP TABLE operations');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE operations_new RENAME TO operations');
        }
    }
};
