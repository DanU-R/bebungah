<?php

namespace App\Imports;

use App\Models\Guest;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // Agar baris 1 dianggap Header

class GuestsImport implements ToModel, WithHeadingRow
{
    private $invitation_id;

    // Kita terima ID undangan dari Controller
    public function __construct($invitation_id)
    {
        $this->invitation_id = $invitation_id;
    }

    public function model(array $row)
    {
        // Pastikan kolom 'nama' di excel ada isinya
        if (!isset($row['nama'])) {
            return null;
        }

        return new Guest([
            'invitation_id' => $this->invitation_id, // Masukkan ID undangan otomatis
            'name'     => $row['nama'],
            'category' => $row['kategori'] ?? 'Reguler', // Kalau kosong, set Reguler
            'slug'     => Str::slug($row['nama']) . '-' . Str::random(4), // Generate Slug
            'phone_number' => $row['whatsapp'] ?? null,
        ]);
    }
}