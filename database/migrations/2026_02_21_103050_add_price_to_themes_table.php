<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            // NULL berarti gunakan harga default dari config/env
            $table->unsignedInteger('price')->nullable()->after('thumbnail')
                  ->comment('Harga per tema dalam Rupiah. NULL = pakai default dari APP_DEFAULT_PRICE di .env');
        });
    }

    public function down(): void
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
