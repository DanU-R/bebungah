<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Auto-generate Slug Unik untuk Tamu (biar nama di cover undangan otomatis)
    // Contoh: Budi Santoso -> budi-santoso-x7z9
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name) . '-' . Str::random(5);
            }
        });
    }

    // Relasi kebalikan: Tamu milik sebuah Undangan
    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}