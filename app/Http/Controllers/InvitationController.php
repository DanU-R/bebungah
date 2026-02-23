<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Guest;
use App\Models\Theme;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class InvitationController extends Controller
{
    public function show($slug, Request $request)
    {
        $invitation = Invitation::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $guest = null;
        if ($request->has('to')) {
            $guest = Guest::where('slug', $request->query('to'))->first();
        }

        $comments = $invitation->guests()
            ->whereNotNull('comment')
            ->where('comment', '!=', '')
            ->orderBy('updated_at', 'desc')
            ->get();

        $viewPath = $invitation->theme->view_path;

        if (!view()->exists($viewPath)) {
            abort(404, "File tema tidak ditemukan: $viewPath");
        }

        return view($viewPath, compact('invitation', 'guest', 'comments'));
    }

    public function demo($themeSlug)
    {
        $theme = Theme::where('slug', $themeSlug)->firstOrFail();

        $invitation = new \stdClass();
        $invitation->slug = 'demo-' . $themeSlug;

        $unsplashKey = 'C9aJ-2k6P3AkE5YTnAuw3A46NRfA5q7nhhfFMP5bDOw';
        $getDummyImg = function($keyword, $orientation = 'portrait') use ($unsplashKey) {
            return \Illuminate\Support\Facades\Cache::remember("unsplash_dummy_" . md5($keyword . $orientation), 86400, function() use ($unsplashKey, $keyword, $orientation) {
                try {
                    $response = \Illuminate\Support\Facades\Http::timeout(5)->get("https://api.unsplash.com/photos/random", [
                        'query' => $keyword,
                        'client_id' => $unsplashKey,
                        'orientation' => $orientation
                    ]);
                    if ($response->successful()) {
                        return $response->json()['urls']['regular'];
                    }
                    return 'https://placehold.co/800x600/DDDDDD/666666/png?text=' . urlencode(substr($keyword, 0, 15));
                } catch (\Exception $e) {
                    return 'https://placehold.co/800x600/DDDDDD/666666/png?text=' . urlencode(substr($keyword, 0, 15));
                }
            });
        };

        $content = [
            'mempelai' => [
                'pria' => [
                    'nama' => 'Romeo Putra Perkasa',
                    'panggilan' => 'Romeo',
                    'ayah' => 'Bpk. Wijaya',
                    'ibu' => 'Ibu Sarah',
                    'instagram' => 'romeo_official',
                    'foto' => $getDummyImg('handsome groom suit wedding'),
                ],
                'wanita' => [
                    'nama' => 'Juliet Bunga Jelita',
                    'panggilan' => 'Juliet',
                    'ayah' => 'Bpk. Sutrisno',
                    'ibu' => 'Ibu Hartini',
                    'instagram' => 'juliet_beauty',
                    'foto' => $getDummyImg('beautiful bride dress wedding'),
                ],
            ],
            'acara' => [
                'akad' => [
                    'judul' => 'Akad Nikah',
                    'waktu' => now()->addDays(10)->format('Y-m-d H:i:s'),
                    'tempat' => 'Masjid Besar Istiqlal',
                    'alamat' => 'Jl. Taman Wijaya Kusuma, Jakarta Pusat',
                    'maps' => 'https://goo.gl/maps/contoh',
                ],
                'resepsi' => [
                    'judul' => 'Resepsi Pernikahan',
                    'waktu' => now()->addDays(10)->addHours(2)->format('Y-m-d H:i:s'),
                    'tempat' => 'Grand Ballroom Hotel Mulia',
                    'alamat' => 'Jl. Asia Afrika, Senayan, Jakarta',
                    'maps' => 'https://goo.gl/maps/contoh',
                ],
            ],
            'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri...',
            'media' => [
                'cover' => $getDummyImg('luxury wedding venue decoration', 'landscape'),
                'music' => 'assets/music/' . $themeSlug . '.mp3',
                'video_link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'gallery' => [
                    $getDummyImg('wedding rings', 'landscape'),
                    $getDummyImg('wedding bouquet', 'portrait'),
                    $getDummyImg('wedding couple walking', 'landscape'),
                    $getDummyImg('wedding cake', 'portrait'),
                ],
            ],
            'love_stories' => [
                [
                    'year' => '2020',
                    'title' => 'Pertama Bertemu',
                    'story' => 'Kami bertemu pertama kali di sebuah kedai kopi di Jakarta Selatan...',
                ],
                [
                    'year' => '2022',
                    'title' => 'Lamaran',
                    'story' => 'Setelah 2 tahun bersama, Romeo memberanikan diri melamar...',
                ],
            ],
            'amplop' => [
                'bank_name' => 'BCA',
                'account_number' => '1234567890',
                'account_holder' => 'Romeo Putra',
                'alamat_kado' => 'Jl. Mawar Melati No. 123, Jakarta Selatan',
                'maps_kado' => 'https://goo.gl/maps/kado',
            ],
        ];

        $invitation->content = $content;
        $invitation->comments = collect([]);

        return view($theme->view_path, compact('invitation'));
    }

    public function kirimUcapan(Request $request)
    {
        $request->validate([
            'invitation_slug' => 'required|exists:invitations,slug',
            'nama'            => 'required|string|max:255',
            'ucapan'          => 'required|string|max:2000',
            'kehadiran'       => 'required|in:hadir,tidak_hadir,ragu',
        ]);

        try {
            $invitation = Invitation::where('slug', $request->invitation_slug)->firstOrFail();

            $guest = Guest::where('invitation_id', $invitation->id)
                ->where('name', $request->nama)
                ->first();

            if ($guest) {
                $guest->update([
                    'comment'     => $request->ucapan,
                    'rsvp_status' => $request->kehadiran,
                ]);
            } else {
                $guestSlug = Str::slug($request->nama) . '-' . Str::random(4);

                $invitation->guests()->create([
                    'name'        => $request->nama,
                    'slug'        => $guestSlug,
                    'category'    => 'Umum',
                    'comment'     => $request->ucapan,
                    'rsvp_status' => $request->kehadiran,
                ]);
            }

            // Log ucapan masuk
            ActivityLog::record('info', 'guest.rsvp_submitted', $invitation, [
                'nama'      => $request->nama,
                'kehadiran' => $request->kehadiran,
            ]);

        } catch (\Exception $e) {
            Log::channel('daily')->error('Failed to save ucapan/rsvp', [
                'invitation_slug' => $request->invitation_slug,
                'error'           => $e->getMessage(),
            ]);

            return back()->with('error', 'Gagal mengirim ucapan. Silakan coba lagi.');
        }

        return back()->with('success', 'Terima kasih! Ucapan Anda berhasil dikirim.');
    }
}
