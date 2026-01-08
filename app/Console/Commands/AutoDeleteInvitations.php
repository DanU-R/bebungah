<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invitation;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AutoDeleteInvitations extends Command
{
    // Nama perintah yang nanti dipanggil
    protected $signature = 'invitation:cleanup';

    // Deskripsi
    protected $description = 'Menghapus undangan yang sudah lewat 3 hari dari tanggal acara';

    public function handle()
    {
        // Cari undangan yang tanggal acaranya sudah lewat 3 hari yang lalu
        // Logika: Jika "Sekarang" dikurangi 3 hari masih lebih besar dari "Tanggal Acara", berarti sudah lewat.
        $expiredInvitations = Invitation::where('event_date', '<', Carbon::now()->subDays(3))->get();

        $count = 0;

        foreach ($expiredInvitations as $invitation) {
            // ... (Kode hapus file foto/storage tetap sama seperti sebelumnya) ...
            if ($invitation->content) {
                $media = $invitation->content['media'] ?? [];
                if (isset($media['cover'])) Storage::disk('public')->delete($media['cover']);
                // ... dst ...
                if (isset($invitation->content['mempelai']['pria']['foto'])) Storage::disk('public')->delete($invitation->content['mempelai']['pria']['foto']);
                if (isset($invitation->content['mempelai']['wanita']['foto'])) Storage::disk('public')->delete($invitation->content['mempelai']['wanita']['foto']);
            }
            
            Storage::disk('public')->deleteDirectory("invitations/{$invitation->uuid}");
            $invitation->delete();
            $count++;
        }

        $this->info("Berhasil membersihkan {$count} undangan yang sudah lewat 3 hari.");
    }
}