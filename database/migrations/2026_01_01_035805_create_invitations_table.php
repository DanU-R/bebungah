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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // PENTING: Nama folder foto menggunakan ini agar aman
            
            // Relasi
            $table->foreignId('theme_id')->constrained('themes');
            // User ID nullable karena saat pesan awal, klien belum punya akun (belum di-ACC admin)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); 
            
            // Info Order
            $table->string('slug')->unique(); // URL undangan (misal: romeo-juliet)
            $table->string('client_whatsapp'); // No WA Klien untuk konfirmasi
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending'); // Status bayar
            
            // Data Acara (Penting untuk Auto Delete)
            $table->dateTime('event_date'); 
            
            // Data Fleksibel (Nama Pengantin, Ortu, Kisah, Lokasi, Link Maps)
            // Disimpan dalam format JSON agar performa cepat
            $table->json('content'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
