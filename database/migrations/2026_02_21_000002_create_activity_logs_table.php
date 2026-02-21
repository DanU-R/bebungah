<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel untuk menyimpan log aktivitas penting (approvals, resets, errors, dll).
     */
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type');                          // 'admin_action', 'security', 'error', 'info'
            $table->string('event');                         // e.g. 'invitation.approved', 'password.reset'
            $table->unsignedBigInteger('user_id')->nullable(); // Siapa yang melakukan aksi
            $table->string('subject_type')->nullable();      // e.g. 'App\Models\Invitation'
            $table->unsignedBigInteger('subject_id')->nullable(); // ID objek yang dikenai aksi
            $table->json('properties')->nullable();          // Data tambahan (JSON bebas)
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            // Index untuk query log lebih cepat
            $table->index('type');
            $table->index('event');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
