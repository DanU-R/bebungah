<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Harga Tema — Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        @keyframes fadeInUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
        .animate-in { animation: fadeInUp 0.45s ease-out both; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

{{-- ── TOPBAR ─────────────────────────────────────────────── --}}
<nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-700 transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Dashboard
            </a>
            <span class="text-gray-300">|</span>
            <h1 class="text-lg font-bold text-gray-900">🎨 Manajemen Harga Tema</h1>
        </div>
        <span class="text-sm font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Admin</span>
    </div>
</nav>

<div class="max-w-6xl mx-auto px-6 py-10 space-y-8">

    {{-- ── ALERTS ─────────────────────────────────────────── --}}
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl flex items-center gap-3 animate-in">
        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-xl animate-in">
        <ul class="list-disc pl-5 space-y-1 text-sm">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    {{-- ── HARGA DEFAULT GLOBAL ─────────────────────────────── --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden animate-in">
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-8 py-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 004 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Harga Default Global</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Berlaku untuk tema yang tidak memiliki harga khusus</p>
                </div>
            </div>
        </div>
        <div class="px-8 py-6">
            <form action="{{ route('admin.themes.defaultPrice') }}" method="POST" class="flex flex-col sm:flex-row items-end gap-4">
                @csrf
                <div class="flex-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Default (Rp)</label>
                    <div class="flex rounded-xl overflow-hidden border-2 border-gray-200 focus-within:border-indigo-500 transition-all">
                        <span class="inline-flex items-center px-4 bg-gray-50 text-gray-500 text-sm font-semibold border-r border-gray-200">Rp</span>
                        <input type="number" name="default_price"
                               value="{{ $defaultPrice }}"
                               min="0" max="99999999" step="1000"
                               class="flex-1 px-4 py-3 text-lg font-bold text-gray-900 focus:outline-none"
                               required>
                    </div>
                    <p class="text-xs text-gray-400 mt-1.5">Nilai saat ini: <strong>Rp {{ number_format($defaultPrice, 0, ',', '.') }}</strong> · Disimpan di file <code class="bg-gray-100 px-1 rounded">.env</code></p>
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3.5 rounded-xl transition flex items-center gap-2 shadow-lg shadow-indigo-200 whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Default
                </button>
            </form>
        </div>
    </div>

    {{-- ── HARGA PER TEMA ─────────────────────────────────── --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden animate-in" style="animation-delay:0.1s">
        <div class="bg-gradient-to-r from-rose-50 to-pink-50 px-8 py-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-500 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Harga Per Tema</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Kosongkan harga untuk menggunakan harga default global</p>
                </div>
            </div>
        </div>

        <div class="divide-y divide-gray-50">
            @foreach($themes as $theme)
            @php
                $hasCustom = !is_null($theme->price);
                $thumbFile = $theme->thumbnail ?: ($theme->slug . '.png');
                $thumbExists = file_exists(public_path('assets/thumbnail/' . $thumbFile));
            @endphp
            <div class="px-8 py-5 flex flex-col sm:flex-row items-start sm:items-center gap-4 hover:bg-gray-50/60 transition-colors group">

                {{-- Thumbnail --}}
                <div class="w-14 h-14 rounded-lg overflow-hidden flex-shrink-0 shadow border border-gray-100">
                    @if($thumbExists)
                        <img src="{{ asset('assets/thumbnail/' . $thumbFile) }}" class="w-full h-full object-cover" alt="">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-xs font-bold text-indigo-500">{{ substr($theme->name,0,2) }}</div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-0.5">
                        <h3 class="font-bold text-gray-900">{{ $theme->name }}</h3>
                        @if($hasCustom)
                            <span class="bg-rose-100 text-rose-700 text-xs font-semibold px-2 py-0.5 rounded-full">Harga Khusus</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 text-xs font-medium px-2 py-0.5 rounded-full">Pakai Default</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500">Slug: <code class="bg-gray-100 px-1 rounded text-xs">{{ $theme->slug }}</code></p>
                    <p class="text-sm font-semibold text-indigo-600 mt-1">Harga efektif: {{ $theme->formatted_price }}</p>
                </div>

                {{-- Form harga --}}
                <form action="{{ route('admin.themes.price', $theme->id) }}" method="POST"
                      class="flex items-center gap-2 flex-shrink-0">
                    @csrf
                    <div class="flex rounded-lg overflow-hidden border border-gray-200 focus-within:border-indigo-500 transition-all">
                        <span class="inline-flex items-center px-2.5 bg-gray-50 text-gray-400 text-xs font-semibold border-r border-gray-200">Rp</span>
                        <input type="number" name="price"
                               value="{{ $theme->price ?? '' }}"
                               min="0" max="99999999" step="1000"
                               placeholder="{{ number_format($defaultPrice, 0, ',', '.') }}"
                               class="w-36 px-3 py-2 text-sm text-gray-900 focus:outline-none">
                    </div>
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold px-4 py-2.5 rounded-lg transition shadow-sm">
                        Simpan
                    </button>
                    @if($hasCustom)
                    <button type="submit" form="reset-{{ $theme->id }}"
                            class="text-gray-400 hover:text-red-500 transition text-xs font-semibold px-2 py-2.5"
                            title="Reset ke default">✕</button>
                    @endif
                </form>

                {{-- Hidden reset form --}}
                @if($hasCustom)
                <form id="reset-{{ $theme->id }}" action="{{ route('admin.themes.price', $theme->id) }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="price" value="">
                </form>
                @endif
            </div>
            @endforeach
        </div>

        <div class="px-8 py-4 bg-amber-50 border-t border-amber-100 flex items-center gap-3">
            <svg class="w-4 h-4 text-amber-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            <p class="text-xs text-amber-700">Kosongkan field harga dan klik Simpan untuk menghapus harga khusus (tema akan kembali ke harga default global).</p>
        </div>
    </div>

    {{-- ── RINGKASAN ─────────────────────────────────────── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 animate-in" style="animation-delay:0.2s">
        @php
            $customCount = $themes->whereNotNull('price')->count();
            $defaultCount = $themes->whereNull('price')->count();
            $minPrice = $themes->min('effective_price');
            $maxPrice = $themes->max('effective_price');
        @endphp
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 text-center">
            <div class="text-2xl font-extrabold text-indigo-600">{{ $themes->count() }}</div>
            <div class="text-xs font-semibold text-gray-500 mt-1">Total Tema</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 text-center">
            <div class="text-2xl font-extrabold text-rose-500">{{ $customCount }}</div>
            <div class="text-xs font-semibold text-gray-500 mt-1">Harga Khusus</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 text-center">
            <div class="text-lg font-extrabold text-emerald-600">Rp {{ number_format($minPrice, 0, ',', '.') }}</div>
            <div class="text-xs font-semibold text-gray-500 mt-1">Harga Terendah</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-5 py-4 text-center">
            <div class="text-lg font-extrabold text-purple-600">Rp {{ number_format($maxPrice, 0, ',', '.') }}</div>
            <div class="text-xs font-semibold text-gray-500 mt-1">Harga Tertinggi</div>
        </div>
    </div>

</div>
</body>
</html>
