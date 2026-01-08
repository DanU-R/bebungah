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
    // 1. Halaman Dashboard Admin (List Orderan Masuk)
    public function index()
    {
        // 1. Ambil data yang statusnya PENDING (Untuk di-ACC)
        $pendingOrders = Invitation::where('status', 'pending')->latest()->get();

        // 2. Ambil data yang statusnya ACTIVE (Untuk Reset Password)
        // Kita load relasi 'user' agar bisa ambil ID user untuk reset password
        $activeOrders = Invitation::where('status', 'active')->with('user')->latest()->get();
        
        // Kirim dua variabel ke view
        return view('admin.dashboard', compact('pendingOrders', 'activeOrders'));
    }

    // 2. Logic ACC / Approve Order
   
    public function approve($id)
{
    $invitation = Invitation::findOrFail($id);

    $credentials = [];

    DB::transaction(function () use ($invitation, &$credentials) {

        // Ambil nama mempelai dari data undangan
        $namaPria = $invitation->content['mempelai']['pria']['nama'];
        $namaWanita = $invitation->content['mempelai']['wanita']['nama'];

        $namaAkun = $namaPria . ' & ' . $namaWanita;

        // Ambil nama depan saja
        $pria = explode(' ', trim($namaPria))[0];
        $wanita = explode(' ', trim($namaWanita))[0];

        // Bersihkan (lowercase + alfanumerik)
        $pria = strtolower(preg_replace('/[^a-z0-9]/i', '', $pria));
        $wanita = strtolower(preg_replace('/[^a-z0-9]/i', '', $wanita));

        // Generate email unik
        $baseEmail = "{$pria}&{$wanita}";
        $email = $baseEmail . '@bebungah.com';

        $counter = 1;
        while (User::where('email', $email)->exists()) {
            $email = $baseEmail . $counter . '@bebungah.com';
            $counter++;
        }

        // Generate password
        $rawPassword = Str::random(8);

        // Buat user
        $user = User::create([
            'name' => $namaAkun,
            'email' => $email,
            'password' => Hash::make($rawPassword),
            'role' => 'client',
        ]);

        // Update invitation
        $invitation->update([
            'status' => 'active',
            'user_id' => $user->id
        ]);

        // Simpan kredensial untuk ditampilkan
        $credentials = [
            'name' => $namaAkun,
            'email' => $email,
            'password' => $rawPassword
        ];
    });

    return redirect()->back()->with('new_account', $credentials);
}


    // FITUR BARU: Reset Password
    public function resetPassword($user_id)
    {
        $user = User::findOrFail($user_id);
        
        // 1. Generate Password Baru (Acak)
        $newPassword = Str::random(8); // Contoh: x7Z9Lm2P

        // 2. Update ke Database (Versi Enkripsi)
        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        // 3. Kembalikan ke Dashboard dengan data Password Mentah (agar bisa dicopy)
        return redirect()->back()->with('reset_success', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $newPassword // Password asli untuk dilihat admin
        ]);
    }
}