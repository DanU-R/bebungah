<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        // Theme::create([
        //     'name' => 'Rustic Green',
        //     'slug' => 'rustic-green',
        //     'thumbnail' => 'rustic-green.png', 
        //     'is_active' => true,
        //     'view_path' => 'themes.rustic-green.index', 
        // ]);

        // Theme::create([
        //     'name' => 'Floral Pastel',
        //     'slug' => 'floral-pastel',
        //     'thumbnail' => 'floral-pastel.png',
        //     'is_active' => true,
        //     'view_path' => 'themes.floral-pastel.index',
        // ]);
        
        // Theme::create([
        //     'name' => 'Royal Glass',
        //     'slug' => 'royal-glass',
        //     'thumbnail' => 'royal-glass.png',
        //     'is_active' => true,
        //     'view_path' => 'themes.royal-glass.index',
        // ]);

        // Theme::create([
        //     'name' => 'Barakah Love',
        //     'slug' => 'barakah-love',
        //     'thumbnail' => 'barakah-love.png',
        //     'is_active' => true,
        //     'view_path' => 'themes.barakah-love.index',
        // ]);
        
        // Theme::updateOrCreate(
        //     ['slug' => 'boho-terracotta'],
        //     [
        //         'name' => 'Boho Terracotta',
        //         'thumbnail' => 'boho-terracotta.png',
        //         'is_active' => true,
        //         'view_path' => 'themes.boho-terracotta.index',
        //     ]
        // );

        // Theme::updateOrCreate(
        //     ['slug' => 'emerald-garden'],
        //     [
        //         'name' => 'Emerald Garden',
        //         'thumbnail' => 'emerald-garden.png',
        //         'is_active' => true,
        //         'view_path' => 'themes.emerald-garden.index',
        //     ]
        // );

        Theme::updateOrCreate(
            ['slug' => 'ocean-breeze'],
            [
                'name' => 'Ocean Breeze',
                'thumbnail' => 'ocean-breeze.png',
                'is_active' => true,
                'view_path' => 'themes.ocean-breeze.index',
            ]
        );

        Theme::updateOrCreate(
            ['slug' => 'watercolor-flow'],
            [
                'name' => 'Watercolor Flow',
                'thumbnail' => 'watercolor-flow.png',
                'is_active' => true,
                'view_path' => 'themes.watercolor-flow.index',
            ]
        );
        
    }
}