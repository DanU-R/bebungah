<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToArray;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->first();

        $guests = [];
        $totalGuests = 0;
        $hadir = 0;
        $tidakHadir = 0;
        $pending = 0;

        if ($invitation) {
            $guests = $invitation->guests()->orderBy('created_at', 'desc')->get();
            $totalGuests = $guests->count();
            $hadir = $guests->where('rsvp_status', 'hadir')->count();
            $tidakHadir = $guests->where('rsvp_status', 'tidak_hadir')->count();
            $pending = $guests->whereIn('rsvp_status', ['pending', null])->count();
        }

        return view('client.dashboard', compact(
            'invitation',
            'guests',
            'totalGuests',
            'hadir',
            'tidakHadir',
            'pending'
        ));
    }

    public function settings()
    {
        $user = Auth::user();
        $invitation = Invitation::where('user_id', $user->id)->firstOrFail();

        return view('client.settings', compact('invitation'));
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user();
        $invitation = $user->invitations()->firstOrFail();

        $content = $invitation->content ?? [];
        $folderName = $invitation->id;

        $uploadFile = function ($inputName, $subFolder) use ($request, $folderName) {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = uniqid() . '_' . $inputName . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs("public/invitations/{$folderName}", $filename);
                return str_replace('public/', 'storage/', $path);
            }
            return null;
        };

        $content['mempelai']['pria']['nama'] = $request->groom_name;
        $content['mempelai']['pria']['panggilan'] = $request->groom_nickname;
        $content['mempelai']['pria']['ayah'] = $request->groom_father;
        $content['mempelai']['pria']['ibu'] = $request->groom_mother;
        $content['mempelai']['pria']['instagram'] = $request->groom_instagram;

        $content['mempelai']['wanita']['nama'] = $request->bride_name;
        $content['mempelai']['wanita']['panggilan'] = $request->bride_nickname;
        $content['mempelai']['wanita']['ayah'] = $request->bride_father;
        $content['mempelai']['wanita']['ibu'] = $request->bride_mother;
        $content['mempelai']['wanita']['instagram'] = $request->bride_instagram;

        $content['quote'] = $request->quote;

        $content['acara']['akad']['judul'] = $request->akad_title;
        $content['acara']['akad']['waktu'] = $request->akad_datetime;
        $content['acara']['akad']['tempat'] = $request->akad_location;
        $content['acara']['akad']['alamat'] = $request->akad_address;
        $content['acara']['akad']['maps'] = $request->akad_map_link;

        $content['acara']['resepsi']['judul'] = $request->resepsi_title;
        $content['acara']['resepsi']['waktu'] = $request->resepsi_datetime;
        $content['acara']['resepsi']['tempat'] = $request->resepsi_location;
        $content['acara']['resepsi']['alamat'] = $request->resepsi_address;
        $content['acara']['resepsi']['maps'] = $request->resepsi_map_link;

        $content['amplop']['bank_name'] = $request->bank_name;
        $content['amplop']['account_number'] = $request->bank_number;
        $content['amplop']['account_holder'] = $request->bank_holder;
        $content['amplop']['alamat_kado'] = $request->gift_address;
        $content['amplop']['maps_kado'] = $request->gift_map_link;

        if ($path = $uploadFile('groom_photo', $folderName)) {
            $content['mempelai']['pria']['foto'] = $path;
        }
        if ($path = $uploadFile('bride_photo', $folderName)) {
            $content['mempelai']['wanita']['foto'] = $path;
        }
        if ($path = $uploadFile('cover_image', $folderName)) {
            $content['media']['cover'] = $path;
        }
        if ($path = $uploadFile('music_file', $folderName)) {
            $content['media']['music'] = $path;
        }

        if ($request->hasFile('gallery_photos')) {
            $galleryPaths = $content['media']['gallery'] ?? [];
            foreach ($request->file('gallery_photos') as $photo) {
                $filename = uniqid() . '_gallery.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs("public/invitations/{$folderName}", $filename);
                $galleryPaths[] = str_replace('public/', 'storage/', $path);
            }
            $content['media']['gallery'] = $galleryPaths;
        }

        $content['media']['video_link'] = $request->video_link;

        if ($request->has('love_stories')) {
            $stories = $request->love_stories;
            foreach ($stories as $key => $story) {
                if ($request->hasFile("love_stories.{$key}.image")) {
                    $file = $request->file("love_stories.{$key}.image");
                    $filename = uniqid() . '_story.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs("public/invitations/{$folderName}", $filename);
                    $stories[$key]['image'] = str_replace('public/', 'storage/', $path);
                } elseif (isset($content['love_stories'][$key]['image'])) {
                    $stories[$key]['image'] = $content['love_stories'][$key]['image'];
                }
            }
            $content['love_stories'] = $stories;
        }

        if (isset($content['acara']['resepsi']['waktu'])) {
            $invitation->event_date = Carbon::parse($content['acara']['resepsi']['waktu']);
        } elseif (isset($content['acara']['akad']['waktu'])) {
            $invitation->event_date = Carbon::parse($content['acara']['akad']['waktu']);
        }

        $invitation->content = $content;
        $invitation->save();

        return back()->with('success', 'Data undangan berhasil diperbarui!');
    }

    public function downloadTemplate()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=template_tamu.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Nama Tamu', 'Nomor WA', 'Kategori', 'Alamat'];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            fputcsv($file, ['Budi Santoso', '081234567890', 'Teman Kerja', 'Jakarta']);
            fputcsv($file, ['Siti Aminah', '089876543210', 'Keluarga', 'Bandung']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function importGuests(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlsx,xls|max:2048'
        ]);

        $user = auth()->user();
        $invitation = $user->invitations()->firstOrFail();

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $rows = [];

        if (in_array($extension, ['csv', 'txt'])) {
            $handle = fopen($file->getPathname(), 'r');
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                if (array_filter($data)) {
                    $rows[] = $data;
                }
            }
            fclose($handle);
        } else {
            try {
                $import = new class implements ToArray {
                    public function array(array $array)
                    {
                        return $array;
                    }
                };

                $data = Excel::toArray($import, $file);

                if (count($data) > 0) {
                    $sheet1 = $data[0];
                    array_shift($sheet1);
                    $rows = $sheet1;
                }
            } catch (\Exception $e) {
                return back()->withErrors([
                    'file' => 'Gagal membaca Excel: ' . $e->getMessage()
                ]);
            }
        }

        $count = 0;

        foreach ($rows as $row) {
            $name = $row[0] ?? null;

            if ($name && trim($name) !== '') {
                $slug = Str::slug($name) . '-' . Str::random(4);

                $invitation->guests()->create([
                    'name' => $name,
                    'whatsapp' => $row[1] ?? null,
                    'category' => $row[2] ?? 'Umum',
                    'address' => $row[3] ?? null,
                    'slug' => $slug,
                    'rsvp_status' => 'pending'
                ]);

                $count++;
            }
        }

        return back()->with('success', "Berhasil mengimpor {$count} data tamu!");
    }

    public function storeGuest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'category' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = auth()->user();
        $invitation = $user->invitations()->firstOrFail();

        $slug = \Illuminate\Support\Str::slug($request->name) . '-' . \Illuminate\Support\Str::random(4);

        $invitation->guests()->create([
            'name' => $request->name,
            'whatsapp' => $request->whatsapp,
            'category' => $request->category ?? 'Umum',
            'address' => $request->address,
            'slug' => $slug,
            'rsvp_status' => 'pending'
        ]);

        return back()->with('success', 'Berhasil menambahkan tamu: ' . $request->name);
    }

}
