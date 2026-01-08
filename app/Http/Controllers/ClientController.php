<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Imports\GuestsImport;
use Intervention\Image\Laravel\Facades\Image; // Pastikan ini benar
use App\Exports\GuestTemplateExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->firstOrFail();

        $totalGuests = $invitation->guests()->count();
        $hadir = $invitation->guests()->where('rsvp_status', 'hadir')->count();
        $tidakHadir = $invitation->guests()->where('rsvp_status', 'tidak_hadir')->count();
        $pending = $invitation->guests()->where('rsvp_status', 'pending')->count();
        $guests = $invitation->guests()->latest()->get();

        return view('client.dashboard', compact('invitation', 'guests', 'totalGuests', 'hadir', 'tidakHadir', 'pending'));
    }

    public function importGuests(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls,csv'
        ]);

        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->firstOrFail();

        Excel::import(new GuestsImport($invitation->id), $request->file('file_excel'));

        return redirect()->back()->with('success', 'Data tamu berhasil diimport!');
    }

    public function downloadTemplate()
    {
        return Excel::download(new GuestTemplateExport, 'template_tamu.xlsx');
    }

    public function settings()
    {
        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->firstOrFail();
        return view('client.settings', compact('invitation'));
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->firstOrFail();

        // 1. Validasi
        $request->validate([
            'groom_name' => 'required',
            'bride_name' => 'required',
            'event_date' => 'required|date',
            'cover_photo' => 'nullable|image|max:10240',
            // Validasi Array Love Story
            'stories.*.title' => 'nullable|string',
            'stories.*.year' => 'nullable|string',
            'stories.*.content' => 'nullable|string',
            'stories.*.image' => 'nullable|image|max:10240',
        ]);

        $content = $invitation->content;

        // A. Update Data Teks
        $content['mempelai']['pria']['nama']   = $request->groom_name;
        $content['mempelai']['pria']['ayah']   = $request->groom_father;
        $content['mempelai']['pria']['ibu']    = $request->groom_mother;
        $content['mempelai']['wanita']['nama'] = $request->bride_name;
        $content['mempelai']['wanita']['ayah'] = $request->bride_father;
        $content['mempelai']['wanita']['ibu']  = $request->bride_mother;
        $content['acara']['alamat']    = $request->location_address;
        $content['acara']['maps_link'] = $request->google_maps_link;
        $content['amplop'] = [
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
        ];
        $content['media']['video_link'] = $request->video_link;

        // B. PROSES UPLOAD FILE (HD Quality)
        $uploadPath = "invitations/{$invitation->uuid}";

        // Helper Function Image Processing
        $processImage = function($file, $width, $prefix, $quality = 85) use ($uploadPath) {
            $filename = uniqid() . "_{$prefix}.webp";
            $path = $uploadPath . '/' . $filename;
            
            // 1. Baca Image
            $image = Image::read($file);
            
            // 2. Resize hanya jika gambar asli lebih besar dari target
            if ($image->width() > $width) {
                $image->scale(width: $width);
            }
            
            // 3. Encode ke WebP
            $encoded = $image->toWebp(quality: $quality);
            
            // 4. SIMPAN (PENTING: Gunakan (string) atau toString())
            // Error sebelumnya terjadi di sini karena $encoded masih berupa Object
            Storage::disk('public')->put($path, (string) $encoded);
            
            return $path;
        };

        // 1. Cover (1920px, Quality 95%)
        if ($request->hasFile('cover_photo')) {
            $content['media']['cover'] = $processImage($request->file('cover_photo'), 1920, 'cover', 95);
        }

        // 2. Foto Pria (800px, Quality 90%)
        if ($request->hasFile('groom_photo')) {
            $content['mempelai']['pria']['foto'] = $processImage($request->file('groom_photo'), 800, 'groom', 90);
        }

        // 3. Foto Wanita (800px, Quality 90%)
        if ($request->hasFile('bride_photo')) {
            $content['mempelai']['wanita']['foto'] = $processImage($request->file('bride_photo'), 800, 'bride', 90);
        }

        // 4. Musik
        if ($request->hasFile('music_file')) {
            $content['media']['music'] = $request->file('music_file')->store($uploadPath, 'public');
        }

        // 5. PROSES LOVE STORY
        $newStories = $request->input('stories', []);
        
        foreach ($newStories as $key => $storyData) {
            // Cek apakah user upload foto baru untuk story ini
            if ($request->hasFile("stories.{$key}.image")) {
                // Upload foto baru (1200px, Quality 90%)
                $newStories[$key]['image'] = $processImage($request->file("stories.{$key}.image"), 1200, "story_{$key}", 90);
            } else {
                // Jika tidak upload, gunakan foto lama dari hidden input
                $newStories[$key]['image'] = $request->input("stories.{$key}.old_image");
            }
        }
        
        // Simpan array stories ke content
        $content['love_stories'] = array_values($newStories);

        // Update Database
        $invitation->update([
            'event_date' => $request->event_date,
            'content' => $content,
        ]);

        return redirect()->back()->with('success', 'Data undangan berhasil disimpan!');
    }
}