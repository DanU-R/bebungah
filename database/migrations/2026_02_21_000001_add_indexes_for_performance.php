<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan index pada kolom yang sering diquery untuk meningkatkan performa database.
     * Ini mengurangi beban full-table-scan pada tabel besar.
     */
    public function up(): void
    {
        // Index pada tabel invitations
        Schema::table('invitations', function (Blueprint $table) {
            $table->index('status');              // Sering difilter: where('status', 'pending')
            $table->index('user_id');             // Sering di-join dengan users
            $table->index('event_date');          // Potensi sorting berdasarkan tanggal acara
        });

        // Index pada tabel guests
        Schema::table('guests', function (Blueprint $table) {
            $table->index('invitation_id');       // Sering diquery: $invitation->guests()
            $table->index('rsvp_status');         // Filter RSVP: where('rsvp_status', ...)
        });
    }

    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['event_date']);
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->dropIndex(['invitation_id']);
            $table->dropIndex(['rsvp_status']);
        });
    }
};
