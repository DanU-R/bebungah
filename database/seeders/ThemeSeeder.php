<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        Theme::create([
            'name' => 'Rustic Green',
            'slug' => 'rustic-green',
            'thumbnail' => 'rustic-green.png', 
            'is_active' => true,
            'view_path' => 'themes.rustic-green.index', 
        ]);

        Theme::create([
            'name' => 'Floral Pastel',
            'slug' => 'floral-pastel',
            'thumbnail' => 'floral-pastel.png',
            'is_active' => true,
            'view_path' => 'themes.floral-pastel.index',
        ]);
        
        Theme::create([
            'name' => 'Royal Glass',
            'slug' => 'royal-glass',
            'thumbnail' => 'royal-glass.png',
            'is_active' => true,
            'view_path' => 'themes.royal-glass.index',
        ]);
        
    }
}