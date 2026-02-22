<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AutoCancelOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:auto-cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membatalkan pesanan pending yang berumur lebih dari 24 jam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mengecek pesanan pending yang kadaluarsa...');
        
        // Cari pesanan dengan status 'pending' yang dibuat lebih dari 24 jam yang lalu
        $limitDate = Carbon::now()->subHours(24);
        
        $expiredOrders = Invitation::where('status', 'pending')
                                   ->where('created_at', '<', $limitDate)
                                   ->get();

        $count = $expiredOrders->count();

        if ($count > 0) {
            foreach ($expiredOrders as $order) {
                $order->update(['status' => 'cancelled']);
                
                $this->info("- Pesanan ID {$order->id} (Slug: {$order->slug}) dibatalkan.");
                
                Log::channel('daily')->info('Order auto-cancelled', [
                    'invitation_id' => $order->id,
                    'slug' => $order->slug,
                    'created_at' => $order->created_at,
                ]);
            }
            $this->info("SUKSES: {$count} pesanan berhasil dibatalkan.");
        } else {
            $this->info("INFO: Tidak ada pesanan pending yang kadaluarsa.");
        }
    }
}
