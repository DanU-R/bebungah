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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained('invitations')->onDelete('cascade');
            
            $table->string('name');
            $table->string('slug'); // Kode unik per tamu
            $table->string('category')->default('Regular'); // Bisa untuk grouping tamu
            $table->string('phone_number')->nullable(); // Jika mau kirim WA Blast
            $table->enum('rsvp_status', ['pending', 'hadir', 'tidak_hadir', 'ragu'])->default('pending');
            $table->text('comment')->nullable(); // Ucapan tamu
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
