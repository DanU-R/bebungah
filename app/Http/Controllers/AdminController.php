<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // 1. Halaman Dashboard Admin
    public function index()
    {
        $pendingOrders = Invitation::where('status', 'pending')->latest()->get();
        // Load user agar tidak N+1 Problem saat looping di view
        $activeOrders = Invitation::where('status', 'active')->with('user')->latest()->get();
        
        return view('admin.dashboard', compact('pendingOrders', 'activeOrders'));
    }

    // 2. Logic Approve Order
    public function approve($id)
    {
        $invitation = Invitation::findOrFail($id);

        // [SAFETY] Cek jika sudah aktif, jangan diproses lagi
        if ($invitation->status === 'active') {
            return redirect()->back()->with('error', 'Pesanan ini sudah aktif sebelumnya!');
        }

        $credentials = [];

        try {
            DB::transaction(function () use ($invitation, &$credentials) {
                
                // Ambil Content dengan null coalescing operator (??) untuk jaga-jaga
                $content = $invitation->content;
                $namaPria = $content['mempelai']['pria']['nama'] ?? 'Mempelai Pria';
                $namaWanita = $content['mempelai']['wanita']['nama'] ?? 'Mempelai Wanita';

                $namaAkun = $namaPria . ' & ' . $namaWanita;

                // Proses generate username clean
                $pria = explode(' ', trim($namaPria))[0];
                $wanita = explode(' ', trim($namaWanita))[0];

                $pria = strtolower(preg_replace('/[^a-z0-9]/i', '', $pria));
                $wanita = strtolower(preg_replace('/[^a-z0-9]/i', '', $wanita));

                // Generate Email
                $baseEmail = "{$pria}.{$wanita}"; // Saya sarankan pakai titik (.) lebih aman dari &
                $email = $baseEmail . '@temanten.inv';

                $counter = 1;
                while (User::where('email', $email)->exists()) {
                    $email = $baseEmail . $counter . '@temanten.inv';
                    $counter++;
                }

                // Password
                $rawPassword = Str::random(8);

                // Create User
                $user = User::create([
                    'name' => $namaAkun,
                    'email' => $email,
                    'password' => Hash::make($rawPassword),
                    'role' => 'client',
                ]);

                // Update Invitation
                $invitation->update([
                    'status' => 'active',
                    'user_id' => $user->id
                ]);

                $credentials = [
                    'name' => $namaAkun,
                    'email' => $email,
                    'password' => $rawPassword
                ];
            });

            return redirect()->back()->with('new_account', $credentials);

        } catch (\Exception $e) {
            // Jika ada error lain (misal koneksi db putus)
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // 3. Reset Password
    public function resetPassword($user_id)
    {
        $user = User::findOrFail($user_id);
        
        $newPassword = Str::random(8);

        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        return redirect()->back()->with('reset_success', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $newPassword
        ]);
    }
}