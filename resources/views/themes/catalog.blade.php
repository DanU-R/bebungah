<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Tema - Temanten Digital Invitation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 48 48%22><rect width=%2248%22 height=%2248%22 rx=%2212%22 fill=%22%234F46E5%22/><path d=%22M15 13h18v6h-6v17h-6v-17h-6v-6z%22 fill=%22white%22/></svg>">

    <style>

        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .nav-scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --primary-light: #818CF8;
            --secondary: #10B981;
            --accent: #F59E0B;
            --dark: #1F2937;
            --gray-900: #111827;
            --gray-800: #1F2937;
            --gray-700: #374151;
            --gray-600: #4B5563;
            --gray-500: #6B7280;
            --gray-400: #9CA3AF;
            --gray-300: #D1D5DB;
            --gray-200: #E5E7EB;
            --gray-100: #F3F4F6;
            --gray-50: #F9FAFB;
            --white: #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #F8FAFC 0%, #EEF2FF 50%, #FDF4FF 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
        }

        .hero {
            padding: 8rem 2rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(79, 70, 229, 0.1);
            border: 1px solid rgba(79, 70, 229, 0.2);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .hero-badge span {
            background: var(--primary);
            color: white;
            padding: 0.125rem 0.5rem;
            border-radius: 50px;
            font-size: 0.7rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.25rem;
            background: linear-gradient(135deg, var(--gray-900), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: var(--gray-500);
            margin-bottom: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--gray-500);
        }

        .filter-bar {
            max-width: 1280px;
            margin: 0 auto 2rem;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-tabs {
            display: flex;
            gap: 0.5rem;
            background: white;
            padding: 0.375rem;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .filter-tab {
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-600);
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            background: transparent;
        }

        .filter-tab:hover { color: var(--primary); }
        .filter-tab.active {
            background: var(--primary);
            color: white;
        }

        .filter-search {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: white;
            padding: 0.625rem 1rem;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .filter-search input {
            border: none;
            outline: none;
            font-size: 0.875rem;
            width: 200px;
            font-family: inherit;
            color: var(--gray-700);
        }

        .filter-search input::placeholder { color: var(--gray-400); }

        .themes-section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        .themes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 2rem;
        }

        .theme-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .theme-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(79, 70, 229, 0.15);
        }

        .theme-card-image {
            position: relative;
            aspect-ratio: 3/4;
            overflow: hidden;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
        }

        .theme-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .theme-card:hover .theme-card-image img {
            transform: scale(1.05);
        }

        .theme-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                transparent 0%,
                transparent 40%,
                rgba(0,0,0,0.7) 100%
            );
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.5rem;
        }

        .theme-card:hover .theme-card-overlay { opacity: 1; }

        .theme-card-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn-preview {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            padding: 0.75rem;
            background: white;
            color: var(--gray-800);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s;
        }

        .btn-preview:hover { background: var(--gray-100); }

        .btn-choose {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s;
        }

        .btn-choose:hover { transform: scale(1.02); }

        .theme-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.875rem;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .theme-badge.new { color: var(--secondary); }
        .theme-badge.popular { color: var(--accent); }
        .theme-badge.islamic { color: #2D5A4A; }

        .theme-price {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.375rem 0.875rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            color: var(--primary);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 10;
        }

        .theme-card-body {
            padding: 1.5rem;
        }

        .theme-card-category {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gray-400);
            margin-bottom: 0.5rem;
        }

        .theme-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .theme-card-description {
            font-size: 0.85rem;
            color: var(--gray-500);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .theme-card-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            background: var(--gray-100);
            border-radius: 50px;
            font-size: 0.7rem;
            color: var(--gray-600);
        }

        .feature-tag svg { width: 12px; height: 12px; }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--gray-500);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 4rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .btn-cta-white {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-cta-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }

        .footer {
            background: var(--gray-900);
            color: var(--gray-400);
            padding: 3rem 2rem 2rem;
            text-align: center;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.5rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 1.5rem 0;
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: white; }

        .footer-copyright {
            font-size: 0.8rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-800);
        }

        @media (max-width: 768px) {
            .navbar-nav { display: none; }

            .hero { padding: 7rem 1.5rem 3rem; }
            .hero-title { font-size: 2rem; }
            .hero-stats { gap: 1.5rem; }
            .stat-number { font-size: 1.5rem; }

            .filter-bar { flex-direction: column; align-items: stretch; }
            .filter-tabs { overflow-x: auto; }
            .filter-search { justify-content: center; }
            .filter-search input { width: 100%; }

            .themes-grid { grid-template-columns: 1fr; }
            .theme-card-image { aspect-ratio: 4/5; }

            .cta-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

    <div id="previewModal" class="fixed inset-0 z-[100] hidden bg-gradient-to-br from-gray-900/98 via-indigo-900/95 to-purple-900/98 backdrop-blur-xl transition-all duration-500 opacity-0 flex flex-col">

        <div class="w-full h-20 bg-gray-900/95 backdrop-blur-xl border-b border-white/20 shadow-xl flex justify-between items-center px-6 md:px-10 z-50 shrink-0">
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-3">
                    <span class="text-white text-sm font-semibold">Mode Tampilan:</span>
                    <div class="flex bg-black/40 rounded-xl p-1.5 border border-white/20 gap-1">
                        <button onclick="setDevice('mobile')" id="btnMobile" class="group p-3 rounded-lg text-white bg-indigo-600 transition-all shadow-lg shadow-indigo-500/30 bg-indigo-700" title="Tampilan Mobile">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </button>
                        <button onclick="setDevice('desktop')" id="btnDesktop" class="group p-3 rounded-lg text-white/70 hover:text-white/90 hover:bg-white/15 transition-all" title="Tampilan Desktop">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a id="btnOrderTheme" href="#" class="btn-primary relative flex bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 md:px-8 py-3 md:py-3.5 rounded-full text-sm md:text-base font-bold transition-all shadow-2xl shadow-indigo-500/40 hover:shadow-indigo-500/60 items-center gap-2 hover:scale-105">
                    <span class="relative z-10">Pilih Tema Ini</span>
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </a>
                <button onclick="closePreview()" class="group text-white/70 hover:text-white transition bg-white/10 hover:bg-red-500/80 rounded-xl p-3 border border-white/20 hover:border-red-500">
                    <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <div class="flex-1 flex items-center justify-center overflow-hidden relative p-6" onclick="closePreview()">

            <div id="loader" class="absolute inset-0 flex flex-col items-center justify-center z-0 pointer-events-none gap-4">
                <div class="relative">
                    <div class="animate-spin rounded-full h-16 w-16 border-4 border-indigo-500/30 border-t-indigo-500"></div>
                    <div class="absolute inset-0 animate-ping rounded-full h-16 w-16 border-4 border-indigo-500/20"></div>
                </div>
                <p class="text-white/60 text-sm font-medium">Memuat preview...</p>
            </div>

            <div id="frameWrapper" class="relative bg-white shadow-2xl transition-all duration-700 ease-in-out z-10 rounded-3xl" onclick="event.stopPropagation()">

                <div id="phoneNotch" class="absolute top-0 left-1/2 transform -translate-x-1/2 w-[140px] h-[32px] bg-gray-900 rounded-b-3xl z-30 pointer-events-none transition-opacity duration-300"></div>

                <iframe id="previewFrame" src="" class="w-full h-full bg-white rounded-3xl" frameborder="0" onload="if(window.hideLoader) window.hideLoader()"></iframe>

            </div>
        </div>
    </div>

    <nav id="mainNav" class="fixed w-full z-50 glass border-b border-gray-100/50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5 flex justify-between items-center">

            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11 group-hover:rotate-12 group-hover:scale-110 transition-all duration-300 drop-shadow-lg">
                    <rect width="48" height="48" rx="12" fill="url(#gradient)" />
                    <defs>
                        <linearGradient id="gradient" x1="0" y1="0" x2="48" y2="48">
                            <stop offset="0%" stop-color="#667eea"/>
                            <stop offset="100%" stop-color="#764ba2"/>
                        </linearGradient>
                    </defs>
                    <path d="M15 13h18v6h-6v17h-6v-17h-6v-6z" fill="white" />
                </svg>
                <div class="flex flex-col">
                    <span class="font-extrabold text-xl text-gray-900 tracking-tight leading-none">TEMANTEN</span>
                    <span class="text-[10px] text-indigo-600 font-semibold tracking-wider uppercase">Digital Invitation</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-10 text-sm font-semibold text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-all duration-300 hover:scale-105 relative group">
                    Beranda
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('themes.index') }}" class="text-indigo-600 font-bold relative group">
                    Katalog Tema
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-indigo-600 transition-all duration-300"></span>
                </a>
                <a href="{{ route('home') }}#harga" class="hover:text-indigo-600 transition-all duration-300 hover:scale-105 relative group">
                    Harga
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('client.dashboard') }}" class="text-sm font-bold text-gray-700 hover:text-indigo-600 transition-all duration-300 hover:scale-105">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-indigo-600 hidden md:block transition-all duration-300 hover:scale-105">Masuk</a>
                @endauth
                <a href="{{ route('order.create') }}" class="btn-primary relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-bold shadow-xl shadow-indigo-200 hover:shadow-2xl hover:shadow-indigo-300 hover:scale-105 transition-all duration-300">
                    <span class="relative z-10">Buat Undangan</span>
                </a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <span>NEW</span>
                Tema Islami Tersedia
            </div>
            <h1 class="hero-title">Koleksi Tema Undangan Digital Premium</h1>
            <p class="hero-subtitle">Pilih desain yang sesuai dengan kepribadian dan gaya pernikahan Anda. Semua tema responsif dan siap pakai.</p>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $themes->count() }}+</div>
                    <div class="stat-label">Tema Tersedia</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">Aman</div>
                    <div class="stat-label">Privasi Terjaga</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Responsive</div>
                </div>
            </div>
        </div>
    </section>

    <div class="filter-bar">
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">Semua</button>
            <button class="filter-tab" data-filter="modern">Modern</button>
            <button class="filter-tab" data-filter="islamic">Islami</button>
            <button class="filter-tab" data-filter="floral">Floral</button>
            <button class="filter-tab" data-filter="rustic">Rustic</button>
            <button class="filter-tab" data-filter="boho terracotta">Boho Terracotta</button>
        </div>
        <div class="filter-search">
            <svg width="18" height="18" fill="none" stroke="#9CA3AF" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Cari tema...">
        </div>
    </div>

    <section class="themes-section">
        @if($themes->count() > 0)
        <div class="themes-grid">
            @foreach($themes as $theme)
            @php
                $descriptions = [
                    'barakah-love' => 'Tema elegan dengan nuansa Islami, warna sage green dan gold. Cocok untuk pasangan muslim.',
                    'emerald-garden' => 'Tema elegan dengan nuansa hijau emerald dan sentuhan emas. Cocok untuk pernikahan modern yang natural.',
                    'floral-pastel' => 'Desain romantis dengan motif bunga pastel yang lembut dan elegan.',
                    'rustic-green' => 'Gaya natural dengan sentuhan kayu dan dedaunan hijau segar.',
                    'royal-glass' => 'Tema mewah dengan efek glassmorphism yang modern dan premium.',
                    'boho-terracotta' => 'Tema bergaya Bohemian dengan sentuhan warna Terracotta yang hangat dan artistik.',
                    'ocean-breeze' => 'Tema segar dengan nuansa laut dan ombak yang menenangkan. Cocok untuk pernikahan outdoor atau pantai.',
                    'watercolor-flow' => 'Tema artistik dengan sentuhan cat air yang lembut dan mengalir indah.',
                    'midnight-garden' => 'Tema mewah bertema malam dengan aksen emas berkilau. Nuansa gelap, elegan, dan penuh bintang.',
                ];
                $description = $descriptions[$theme->slug] ?? 'Tema undangan digital dengan desain eksklusif dan responsif.';

                $categories = [
                    'barakah-love' => 'Islamic',
                    'emerald-garden' => 'Modern Islamic',
                    'floral-pastel' => 'Floral',
                    'rustic-green' => 'Rustic',
                    'royal-glass' => 'Modern',
                    'boho-terracotta' => 'Boho Terracotta',
                    'ocean-breeze' => 'Ocean',
                    'watercolor-flow' => 'Watercolor',
                    'midnight-garden' => 'Modern',
                ];
                $category = $categories[$theme->slug] ?? 'Wedding';

                $badges = [
                    'barakah-love' => ['islamic', '🕌 Islamic'],
                    'emerald-garden' => ['new', '✨ New'],
                    'floral-pastel' => ['popular', '⭐ Popular'],
                    'rustic-green' => ['new', '✨ New'],
                    'boho-terracotta' => ['new', '✨ New'],
                    'ocean-breeze' => ['popular', '🌊 Popular'],
                    'watercolor-flow' => ['new', '🎨 New'],
                    'midnight-garden' => ['new', '🌙 New'],
                ];
                $badge = $badges[$theme->slug] ?? null;

                $features = [
                    'barakah-love' => ['Ayat Al-Quran', 'Countdown', 'RSVP', 'Music'],
                    'emerald-garden' => ['Love Story', 'Gallery', 'RSVP', 'Music'],
                    'floral-pastel' => ['Gallery', 'Love Story', 'RSVP', 'Music'],
                    'rustic-green' => ['Countdown', 'Gallery', 'RSVP', 'Maps'],
                    'royal-glass' => ['Glass Effect', 'Gallery', 'RSVP', 'Music'],
                    'boho-terracotta' => ['Bohemian Art', 'Gallery', 'RSVP', 'Music'],
                    'ocean-breeze' => ['Ocean Vibes', 'Gallery', 'RSVP', 'Music'],
                    'watercolor-flow' => ['Artistic', 'Gallery', 'RSVP', 'Music'],
                    'midnight-garden' => ['Dark Luxury', 'Stars BG', 'RSVP', 'Music'],
                ];
                $featureList = $features[$theme->slug] ?? ['Responsive', 'Gallery', 'RSVP'];
            @endphp
            <div class="theme-card" data-category="{{ strtolower($category) }}" data-name="{{ strtolower($theme->name) }}">
                <div class="theme-card-image">
                    @if($badge)
                    <span class="theme-badge {{ $badge[0] }}">{{ $badge[1] }}</span>
                    @endif
                    <span class="theme-price">Rp 99k</span>
                    {{-- Selalu gunakan slug sebagai nama file thumbnail, bukan kolom thumbnail dari DB --}}
                    <img src="{{ asset('assets/thumbnail/' . $theme->slug . '.png') }}" alt="{{ $theme->name }}" onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=600&fit=crop'">
                    <div class="theme-card-overlay">
                        <div class="theme-card-actions">
                            <button onclick="openPreview('{{ route('demo.show', $theme->slug) }}')" class="btn-preview">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Preview
                            </button>
                            <a href="{{ route('order.create', ['theme' => $theme->slug]) }}" class="btn-choose">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Pilih Tema
                            </a>
                        </div>
                    </div>
                </div>
                <div class="theme-card-body">
                    <p class="theme-card-category">{{ $category }}</p>
                    <h3 class="theme-card-title">{{ $theme->name }}</h3>
                    <p class="theme-card-description">{{ $description }}</p>
                    <div class="theme-card-features">
                        @foreach($featureList as $feature)
                        <span class="feature-tag">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <div class="empty-state-icon">🎨</div>
            <h3>Belum Ada Tema</h3>
            <p>Tema undangan akan segera tersedia. Nantikan koleksi terbaru kami!</p>
        </div>
        @endif
    </section>

    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Siap Membuat Undangan Impian Anda?</h2>
            <p class="cta-subtitle">Pilih tema favorit dan mulai buat undangan digital dalam hitungan menit. Mudah, cepat, dan elegan.</p>
            <a href="{{ route('order.create') }}" class="btn-cta-white">
                Mulai Sekarang
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-brand">Temanten</div>
        <p>Digital Wedding Invitation Platform</p>
        <div class="footer-links">
            <a href="#">Tentang Kami</a>
            <a href="#">Cara Kerja</a>
            <a href="#">Harga</a>
            <a href="#">FAQ</a>
            <a href="#">Kontak</a>
        </div>
        <p class="footer-copyright">© 2026 Temanten. All rights reserved.</p>
    </footer>

    <script>

        const modal = document.getElementById('previewModal');
        const frame = document.getElementById('previewFrame');
        const loader = document.getElementById('loader');
        const frameWrapper = document.getElementById('frameWrapper');
        const phoneNotch = document.getElementById('phoneNotch');
        const btnMobile = document.getElementById('btnMobile');
        const btnDesktop = document.getElementById('btnDesktop');
        const btnOrder = document.getElementById('btnOrderTheme');

        window.hideLoader = function () {
            if (loader) {
                loader.classList.add('opacity-0');
                setTimeout(() => loader.classList.add('hidden'), 300);
            }
        };

        window.openPreview = function (url) {
            if (loader) {
                loader.classList.remove('hidden', 'opacity-0');
            }

            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                setTimeout(() => modal.classList.remove('opacity-0'), 10);
            }

            if (frame) {
                frame.src = url;
                frame.onload = function () {
                    if (window.hideLoader) window.hideLoader();
                };
            }

            if (btnOrder && url) {
                const slug = url.split('/').pop();
                btnOrder.href = "{{ route('order.create') }}?theme=" + slug;
            }

            setDevice('mobile');
        };

        window.closePreview = function () {
            if (modal) {
                modal.classList.add('opacity-0');
                document.body.style.overflow = '';
                setTimeout(() => {
                    modal.classList.add('hidden');
                    if (frame) frame.src = '';
                }, 300);
            }
        };

        window.setDevice = function (type) {
            if (!frameWrapper || !frame) return;

            if (type === 'mobile') {
                frameWrapper.className =
                    "relative transition-all duration-700 ease-in-out shadow-2xl bg-gradient-to-b from-gray-800 to-gray-900 border-[14px] border-gray-900 rounded-[3rem] overflow-hidden";
                frameWrapper.style.width = "375px";
                frameWrapper.style.height = "812px";
                frame.className = "w-full h-full bg-white rounded-[2rem]";
                if (phoneNotch) phoneNotch.classList.remove('hidden');
                highlightBtn(btnMobile, btnDesktop);
            } else {
                frameWrapper.className =
                    "relative transition-all duration-700 ease-in-out shadow-2xl bg-white border-0 rounded-2xl overflow-hidden";
                frameWrapper.style.width = "90%";
                frameWrapper.style.height = "90%";
                frameWrapper.style.maxWidth = "1400px";
                frame.className = "w-full h-full bg-white";
                if (phoneNotch) phoneNotch.classList.add('hidden');
                highlightBtn(btnDesktop, btnMobile);
            }
        };

        function highlightBtn(active, inactive) {
            if (active) {
                active.className = "group p-3 rounded-lg text-indigo-300 bg-white/15 transition-all";
            }
            if (inactive) {
                inactive.className = "group p-3 rounded-lg text-white/50 hover:text-white/90 hover:bg-white/10 transition-all";
            }
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") closePreview();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.filter-tab');
            const searchInput = document.querySelector('.filter-search input');
            const cards = document.querySelectorAll('.theme-card');
            const emptyState = document.querySelector('.empty-state');
            const themesGrid = document.querySelector('.themes-grid');

            function filterThemes() {
                const activeTab = document.querySelector('.filter-tab.active');
                const category = activeTab ? activeTab.getAttribute('data-filter') : 'all';
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const cardName = card.getAttribute('data-name');

                    const matchesCategory = category === 'all' || cardCategory === category;
                    const matchesSearch = cardName.includes(searchTerm);

                    if (matchesCategory && matchesSearch) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    if (!emptyState) {
                        const emptyDiv = document.createElement('div');
                        emptyDiv.className = 'empty-state';
                        emptyDiv.innerHTML = `
                            <div class="empty-state-icon">🔍</div>
                            <h3>Tidak Ada Hasil</h3>
                            <p>Coba kata kunci lain atau ganti kategori filter.</p>
                        `;
                        themesGrid?.parentNode.appendChild(emptyDiv);
                    } else {
                        emptyState.style.display = 'block';
                        emptyState.innerHTML = `
                             <div class="empty-state-icon">🔍</div>
                             <h3>Tidak Ada Hasil</h3>
                             <p>Tidak ada tema yang cocok dengan "${searchTerm}" di kategori ini.</p>
                        `;
                    }
                    if(themesGrid) themesGrid.style.display = 'none';
                } else {
                    if (emptyState) emptyState.style.display = 'none';
                    if(themesGrid) themesGrid.style.display = 'grid';
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    filterThemes();
                });
            });

            searchInput.addEventListener('input', function() {
                filterThemes();
            });
        });

        const mainNav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                mainNav.classList.add('nav-scrolled', 'py-3');
                mainNav.classList.remove('py-5');
            } else {
                mainNav.classList.remove('nav-scrolled', 'py-3');
                mainNav.classList.add('py-5');
            }
        });
    </script>
</body>
</html>
