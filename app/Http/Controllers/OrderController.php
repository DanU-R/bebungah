<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Penting untuk transaksi database

class OrderController extends Controller
{
    // 1. Tampilkan Halaman Form Order
    public function create()
    {
        // Hanya ambil tema yang aktif (is_active = true)
        $themes = Theme::where('is_active', true)->get();
        
        return view('order.form', compact('themes'));
    }

    // 2. Proses Simpan Data
    public function store(Request $request)
    {
        // A. Validasi Input
        $request->validate([
            'slug'            => 'required|alpha_dash|unique:invitations,slug',
            'theme_id'        => 'required|exists:themes,id',
            'client_whatsapp' => 'required|numeric',
            'groom_name'      => 'required|string',
            'bride_name'      => 'required|string',
            'event_date'      => 'required|date',
        ], [
            'slug.required'            => 'Link undangan wajib diisi.',
            'slug.unique'              => 'Link undangan ini sudah dipakai, silakan pilih link lain.',
            'slug.alpha_dash'          => 'Link hanya boleh berisi huruf, angka, dan tanda strip (-).',
            'client_whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'theme_id.required'        => 'Silakan pilih salah satu tema.',
        ]);

        // B. Generate Email Otomatis untuk Login
        // Format: slug@temanten.com (Contoh: romeo-juliet@temanten.com)
        // Kita gunakan domain dummy 'temanten.com' atau 'bebungah.com' sebagai username login
        $generatedEmail = $request->slug . '@temanten.com';

        // Cek apakah email user ini sudah ada (Double safety selain validasi slug)
        if (User::where('email', $generatedEmail)->exists()) {
            return back()->withErrors(['slug' => 'ID Login untuk link ini sudah terdaftar. Mohon ganti link undangan.'])->withInput();
        }

        // C. Mulai Transaksi Database
        // Gunanya: Jika simpan User berhasil tapi simpan Undangan gagal, maka User akan dibatalkan otomatis.
        DB::beginTransaction();

        try {
            // 1. Buat User Baru
            $user = User::create([
                'name'     => $request->groom_name . ' & ' . $request->bride_name,
                'email'    => $generatedEmail, 
                'password' => Hash::make(Str::random(10)), // Password random sementara (nanti bisa direset/dikirim via WA)
                'role'     => 'client',
            ]);

            // 2. Siapkan Struktur Data Default (JSON)
            // Ini disesuaikan agar tidak error saat masuk Dashboard Client
            $content = [
                'mempelai' => [
                    'pria' => [
                        'nama'      => $request->groom_name,
                        'panggilan' => explode(' ', $request->groom_name)[0], // Ambil kata pertama sebagai panggilan
                        'ayah'      => 'Bpk. (Nama Ayah Pria)', 
                        'ibu'       => 'Ibu (Nama Ibu Pria)',
                        'foto'      => null
                    ],
                    'wanita' => [
                        'nama'      => $request->bride_name,
                        'panggilan' => explode(' ', $request->bride_name)[0],
                        'ayah'      => 'Bpk. (Nama Ayah Wanita)',
                        'ibu'       => 'Ibu (Nama Ibu Wanita)',
                        'foto'      => null
                    ]
                ],
                'acara' => [
                    'akad' => [
                        'judul'   => 'Akad Nikah',
                        'waktu'   => $request->event_date . ' 08:00:00', // Default jam 8 pagi
                        'tempat'  => 'Lokasi Akad',
                        'alamat'  => 'Alamat lengkap lokasi akad...',
                        'maps'    => '#'
                    ],
                    'resepsi' => [
                        'judul'   => 'Resepsi Pernikahan',
                        'waktu'   => $request->event_date . ' 11:00:00', // Default jam 11 siang
                        'tempat'  => 'Lokasi Resepsi',
                        'alamat'  => 'Alamat lengkap lokasi resepsi...',
                        'maps'    => '#'
                    ]
                ],
                'media' => [
                    'cover'      => null, 
                    'music'      => null, 
                    'video_link' => null,
                    'gallery'    => []
                ],
                'amplop' => [
                    'bank_name'      => 'BCA',
                    'account_number' => '1234567890',
                    'account_holder' => $request->groom_name,
                    'alamat_kado'    => 'Alamat rumah mempelai...'
                ],
                'love_stories' => [],
                'quote'        => 'Kami mengundang Anda untuk merayakan pernikahan kami.'
            ];

            // 3. Simpan Data Undangan
            Invitation::create([
                'uuid'            => (string) Str::uuid(),
                'user_id'         => $user->id,
                'theme_id'        => $request->theme_id,
                'slug'            => $request->slug,
                'title'           => 'The Wedding of ' . $request->groom_name . ' & ' . $request->bride_name,
                'event_date'      => $request->event_date,
                'status'          => 'pending', // Status awal 'pending' menunggu pembayaran
                'client_whatsapp' => $request->client_whatsapp,
                'content'         => $content
            ]);

            // Jika semua lancar, simpan permanen (Commit)
            DB::commit();

            // D. Redirect ke Halaman Pembayaran (atau Sukses)
            return redirect()->route('order.payment')->with([
                'success'     => 'Pesanan berhasil dibuat!',
                'order_email' => $generatedEmail, 
                'order_wa'    => $request->client_whatsapp,
                'order_slug'  => $request->slug
            ]);

        } catch (\Exception $e) {
            // Jika ada error, batalkan semua perubahan database (Rollback)
            DB::rollBack();

            // Kembali ke form dengan pesan error
            return back()->withErrors(['msg' => 'Terjadi kesalahan sistem: ' . $e->getMessage()])->withInput();
        }
    }

    // 3. Menampilkan Halaman Pembayaran
    public function payment()
    {
        // Cek session agar halaman ini tidak bisa dibuka langsung tanpa order
        if (!session('success')) {
            return redirect()->route('order.create');
        }

        return view('order.payment');
    }
}