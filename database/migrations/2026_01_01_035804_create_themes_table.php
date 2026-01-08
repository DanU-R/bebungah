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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama tema (misal: "Elegant Gold")
            $table->string('slug')->unique(); // Untuk URL preview
            $table->string('view_path'); // Lokasi file blade (misal: 'themes.elegant_gold.index')
            $table->string('thumbnail')->nullable(); // Foto preview tema
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
