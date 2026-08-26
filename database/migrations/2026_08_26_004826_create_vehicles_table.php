<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->string('model');
            $table->year('year');
            $table->string('version')->nullable();
            $table->string('engine')->nullable();
            $table->string('transmission')->nullable();
            $table->string('origin_country')->nullable();
            $table->enum('availability', ['available', 'on_request', 'sold'])->default('on_request');
            $table->json('images')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
