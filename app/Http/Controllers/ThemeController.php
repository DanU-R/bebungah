<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function index()
    {
        $themes = Theme::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('themes.catalog', compact('themes'));
    }

    public function show($slug)
    {
        $theme = Theme::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $themes = Theme::where('is_active', true)
            ->where('id', '!=', $theme->id)
            ->take(3)
            ->get();

        return view('themes.detail', compact('theme', 'themes'));
    }
}
