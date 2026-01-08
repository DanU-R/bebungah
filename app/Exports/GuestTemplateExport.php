<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestTemplateExport implements WithHeadings
{
    // Tentukan Judul Kolom (Header)
    public function headings(): array
    {
        return [
            'nama',      // Kolom A
            'kategori',  // Kolom B
            'whatsapp',  // Kolom C
        ];
    }
}