<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Harga efektif tema ini.
     * Jika kolom price terisi → gunakan itu.
     * Jika null → gunakan APP_DEFAULT_PRICE dari .env (default: 99000).
     */
    public function getEffectivePriceAttribute(): int
    {
        return $this->price ?? config('app.default_price', 99000);
    }

    /**
     * Harga terformat penuh, contoh: "Rp 99.000"
     * Digunakan di form pemesanan dan checkout.
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->effective_price, 0, ',', '.');
    }

    /**
     * Harga singkat untuk badge/kartu katalog.
     * Contoh: 99000 → "99K" | 1500000 → "1,5Jt" | 150000 → "150K"
     */
    public function getShortPriceAttribute(): string
    {
        $price = $this->effective_price;
        if ($price >= 1_000_000) {
            $val = $price / 1_000_000;
            return ($val == (int)$val ? (int)$val : number_format($val, 1, ',', '')) . 'Jt';
        }
        if ($price >= 1_000) {
            $val = $price / 1_000;
            return ($val == (int)$val ? (int)$val : number_format($val, 1, ',', '')) . 'K';
        }
        return 'Rp ' . $price;
    }
}