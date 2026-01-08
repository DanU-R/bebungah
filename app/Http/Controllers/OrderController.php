<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // 1. Tampilkan Halaman Form Order
    public function create()
    {
        // Ambil semua tema untuk dipilih di dropdown/select
        $themes = Theme::where('is_active', true)->get();
        return view('order.form', compact('themes'));
    }

    // 2. Proses Simpan Data (Inti Sistem)
    public function store(Request $request)
    {
        // A. Validasi Input (Updated)
        $validated = $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'client_whatsapp' => 'required|numeric',
            'event_date' => 'required|date',
            'slug' => 'required|alpha_dash|unique:invitations,slug',
            
            // Data Pria
            'groom_name' => 'required|string',
            'groom_father' => 'required|string',
            'groom_mother' => 'required|string',

            // Data Wanita (BARU)
            'bride_name' => 'required|string',
            'bride_father' => 'required|string', 
            'bride_mother' => 'required|string',
            
            // Cerita (BARU - Optional)
            'story' => 'nullable|string', 

            'location_address' => 'required|string',
            'cover_photo' => 'nullable|image|max:2048',
            'gallery_photos.*' => 'nullable|image|max:2048',
        ]);

        $uuid = (string) Str::uuid();

        // Upload Cover
        $coverPath = null;
        if ($request->hasFile('cover_photo')) {
            $coverPath = $request->file('cover_photo')->store("invitations/{$uuid}", 'public');
        }

        // Upload Gallery
        $galleryPaths = [];
        if ($request->hasFile('gallery_photos')) {
            foreach ($request->file('gallery_photos') as $photo) {
                $galleryPaths[] = $photo->store("invitations/{$uuid}/gallery", 'public');
            }
        }

        // D. Susun Data JSON (Updated Structure)
        // Kita rapikan strukturnya agar simetris Pria dan Wanita
        $contentJson = [
            'mempelai' => [
                'pria' => [
                    'nama' => $request->groom_name,
                    'ayah' => $request->groom_father,
                    'ibu' => $request->groom_mother,
                ],
                'wanita' => [
                    'nama' => $request->bride_name,
                    'ayah' => $request->bride_father, // Baru
                    'ibu' => $request->bride_mother,  // Baru
                ],
            ],
            'cerita' => $request->story, // Baru
            'acara' => [
                'alamat' => $request->location_address,
                'maps_link' => $request->google_maps_link ?? '#',
            ],
            'media' => [
                'cover' => $coverPath,
                'gallery' => $galleryPaths,
            ],
        ];

        // Simpan ke Database
        $invitation = Invitation::create([
            'uuid' => $uuid,
            'theme_id' => $request->theme_id,
            'client_whatsapp' => $request->client_whatsapp,
            'slug' => $request->slug,
            'event_date' => $request->event_date,
            'status' => 'pending',
            'content' => $contentJson,
        ]);

        return redirect()->route('order.success', ['id' => $invitation->id]);
    }

    // 3. Halaman Sukses & Redirect WA
    public function success($id)
    {
        $invitation = Invitation::findOrFail($id);

        // Pesan WhatsApp
        $message = "Halo Admin, saya baru saja membuat pesanan undangan digital.\n\n";
        $message .= "ID Pesanan: #INV-" . $invitation->id . "\n";
        $message .= "Slug/URL: " . $invitation->slug . "\n";
        $message .= "Tanggal Acara: " . $invitation->event_date->format('d M Y') . "\n";
        $message .= "Mohon diproses untuk pembayarannya. Terima kasih.";

        // Encode URL agar karakter spasi/enter aman
        $waLink = "https://wa.me/6282220312195?text=" . urlencode($message);

        return view('order.success', compact('invitation', 'waLink'));
    }
}