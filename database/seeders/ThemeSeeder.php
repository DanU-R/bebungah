<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Theme::create([
            'name' => 'Rustic Gold Premium',
            'slug' => 'rustic-gold',
            'view_path' => 'themes.rustic-gold.index', // Pastikan folder ini nanti kita buat
            'thumbnail' => 'rustic-thumb.jpg',
            'is_active' => true,
        ]);
        
        \App\Models\Theme::create([
            'name' => 'Minimalist Black',
            'slug' => 'minimal-black',
            'view_path' => 'themes.minimal-black.index',
            'thumbnail' => 'minimal-thumb.jpg',
            'is_active' => true,
        ]);
    }
}
