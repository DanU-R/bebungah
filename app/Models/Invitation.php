<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str; // Penting untuk UUID

class Invitation extends Model
{
    use HasFactory;

    // Kita izinkan semua kolom diisi (kecuali id), karena kita sudah validasi di controller nanti
    protected $guarded = ['id'];

    // Ini FITUR AJAIB-nya
    // Mengubah kolom 'content' otomatis jadi Array saat diambil, dan jadi JSON saat disimpan
    // Mengubah event_date jadi format tanggal yang bisa dihitung (untuk countdown)
    protected $casts = [
        'content' => 'array',
        'event_date' => 'datetime',
    ];

    // Auto-generate UUID saat order dibuat
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    // Relasi: 1 Undangan punya banyak Tamu
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    // Relasi: 1 Undangan memiliki 1 Tema
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    
    // Relasi: 1 Undangan dimiliki 1 User (setelah di-ACC)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}