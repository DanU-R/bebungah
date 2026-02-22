<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'price'       => 'integer',
        'promo_price' => 'integer',
        'is_active'   => 'boolean',
    ];

    /**
     * Harga asli sebelum promo.
     * Jika kolom price terisi → gunakan itu.
     * Jika null → gunakan APP_DEFAULT_PRICE dari .env (default: 99000).
     */
    public function getOriginalPriceAttribute(): int
    {
        return $this->price ?? config('app.default_price', 99000);
    }

    /**
     * Harga efektif tema ini untuk checkout.
     * Jika kolom promo_price terisi → gunakan itu.
     * Jika tidak, gunakan original_price.
     */
    public function getEffectivePriceAttribute(): int
    {
        return $this->promo_price ?? $this->original_price;
    }

    /**
     * Cek apakah tema ini memiliki promo aktif
     */
    public function getHasPromoAttribute(): bool
    {
        return !is_null($this->promo_price) && $this->promo_price < $this->original_price;
    }

    /**
     * Harga asli terformat penuh, contoh: "Rp 150.000"
     */
    public function getFormattedOriginalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->original_price, 0, ',', '.');
    }

    /**
     * Harga terformat penuh, contoh: "Rp 99.000"
     * Digunakan di form pemesanan dan checkout (Harga setelah diskon jika ada).
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->effective_price, 0, ',', '.');
    }

    /**
     * Harga asli terformat singkat, contoh: 90000 -> "90K"
     */
    public function getShortOriginalPriceAttribute(): string
    {
        $price = $this->original_price;
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