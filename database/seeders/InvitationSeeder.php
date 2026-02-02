<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invitation;
use App\Models\Theme;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InvitationSeeder extends Seeder
{
    public function run(): void
    {
        $royalGlass   = Theme::where('slug', 'royal-glass')->firstOrFail();
        $rusticGreen  = Theme::where('slug', 'rustic-green')->firstOrFail();
        $floralPastel = Theme::where('slug', 'floral-pastel')->firstOrFail();

        Invitation::create([
            'uuid' => Str::uuid(),
            'theme_id' => $royalGlass->id,
            'slug' => 'romeo-juliet',
            'client_whatsapp' => '6281234567890',
            'status' => 'active',
            'event_date' => Carbon::parse('2026-02-20 08:00:00'),

            'content' => [
                'mempelai' => [
                    'pria' => [
                        'nama' => 'Romeo Pratama, S.Kom',
                        'panggilan' => 'Romeo',
                        'ayah' => 'Bpk. Adam',
                        'ibu' => 'Ibu Hawa',
                        'instagram' => 'romeo_pratama',
                        'foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1000',
                    ],
                    'wanita' => [
                        'nama' => 'Juliet Kusuma, S.Ak',
                        'panggilan' => 'Juliet',
                        'ayah' => 'Bpk. Capulet',
                        'ibu' => 'Ibu Lady',
                        'instagram' => 'juliet_kusuma',
                        'foto' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1000',
                    ],
                ],

                'acara' => [
                    'akad' => [
                        'judul' => 'Akad Nikah',
                        'waktu' => '2026-02-20 08:00:00',
                        'tempat' => 'Masjid Al-Ikhlas',
                        'alamat' => 'Jl. Merpati No. 10, Jakarta Selatan',
                        'maps' => 'https://goo.gl/maps/contoh1',
                    ],
                    'resepsi' => [
                        'judul' => 'Resepsi Pernikahan',
                        'waktu' => '2026-02-20 11:00:00',
                        'tempat' => 'Grand Ballroom Hotel',
                        'alamat' => 'Jl. Sudirman Kav. 50, Jakarta Pusat',
                        'maps' => 'https://goo.gl/maps/contoh2',
                    ],
                ],

                'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup...',

                'love_stories' => [
                    [
                        'year' => '2018',
                        'title' => 'First Meet',
                        'story' => 'Kami bertemu di perpustakaan kota.',
                    ],
                    [
                        'year' => '2023',
                        'title' => 'She Said Yes',
                        'story' => 'Lamaran romantis di kaki gunung.',
                    ],
                ],

                'media' => [
                    'cover' => 'https://images.unsplash.com/photo-1621621667797-e06afc217fb0',
                    'gallery' => [
                        'https://images.unsplash.com/photo-1511285560982-1351cdeb9821',
                        'https://images.unsplash.com/photo-1583939003579-730e3918a45a',
                    ],
                ],

                'amplop' => [
                    'bank_name' => 'BCA',
                    'account_number' => '1234567890',
                    'account_holder' => 'Romeo Pratama',
                    'alamat_kado' => 'Jl. Kebahagiaan No. 10',
                    'maps_kado' => 'https://goo.gl/maps/contoh3',
                ],
            ],
        ]);
    }
}
