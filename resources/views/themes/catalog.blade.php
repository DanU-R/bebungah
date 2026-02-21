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

    <div id="previewModal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-xl transition-all duration-500 opacity-0 flex flex-col">

        {{-- Modal Header --}}
        <div class="w-full shrink-0 bg-gray-950/95 border-b border-white/10 flex justify-between items-center px-5 py-3 z-50">
            {{-- Left: device toggle + theme name --}}
            <div class="flex items-center gap-4">
                <div class="flex bg-white/5 rounded-xl p-1 border border-white/10 gap-1">
                    <button onclick="setDevice('mobile')" id="btnMobile" title="Mobile" class="px-3 py-2 rounded-lg text-xs font-semibold text-indigo-300 bg-indigo-600/30 border border-indigo-500/40 transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        Mobile
                    </button>
                    <button onclick="setDevice('desktop')" id="btnDesktop" title="Desktop" class="px-3 py-2 rounded-lg text-xs font-semibold text-white/50 hover:text-white hover:bg-white/10 transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Desktop
                    </button>
                </div>
                <div class="hidden md:block">
                    <p id="previewThemeName" class="text-white font-semibold text-sm">Preview Tema</p>
                    <p class="text-white/40 text-xs">Scroll untuk jelajahi · Klik luar untuk tutup</p>
                </div>
            </div>
            {{-- Right: Order + Close --}}
            <div class="flex items-center gap-3">
                <a id="btnOrderTheme" href="#"
                   class="hidden sm:flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-lg shadow-indigo-500/30 hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Pilih Tema Ini
                </a>
                <button onclick="closePreview()" title="Tutup (Esc)" class="text-white/60 hover:text-white bg-white/5 hover:bg-red-600 border border-white/10 hover:border-red-500 rounded-xl p-2.5 transition-all group">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Modal Body --}}
        <div class="flex-1 flex items-center justify-center overflow-hidden relative" onclick="closePreview()">

            {{-- Loader --}}
            <div id="loader" class="absolute inset-0 flex flex-col items-center justify-center z-20 pointer-events-none gap-4 bg-black/80">
                <div class="relative">
                    <div class="animate-spin rounded-full h-14 w-14 border-4 border-indigo-500/30 border-t-indigo-500"></div>
                </div>
                <p class="text-white/50 text-sm">Memuat tema...</p>
            </div>

            {{-- Phone Frame (Mobile) --}}
            <div id="frameWrapper" onclick="event.stopPropagation()" class="relative transition-all duration-500 flex-shrink-0 shadow-2xl">
                {{-- Phone chrome --}}
                <div id="phoneChromeTop" class="absolute top-0 inset-x-0 z-30 pointer-events-none">
                    <div class="mx-auto w-[120px] h-[28px] bg-gray-900 rounded-b-2xl"></div>
                </div>
                {{-- Home indicator --}}
                <div id="phoneChromeBottom" class="absolute bottom-0 inset-x-0 z-30 pointer-events-none flex justify-center pb-2">
                    <div class="w-20 h-1 bg-white/30 rounded-full"></div>
                </div>
                <iframe id="previewFrame" src="" frameborder="0" scrolling="yes"
                    class="block bg-white"
                    style="width:375px;height:calc(100vh - 110px);border-radius:44px;display:block;"
                    onload="onFrameLoad()"></iframe>
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
                <a href="{{ route('order.create') }}" class="hover:text-indigo-600 transition-all duration-300 hover:scale-105 relative group">
                    Pesan Sekarang
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

    <div class="filter-bar" style="flex-wrap:wrap; gap:0.75rem;">
        <div class="filter-tabs" id="filterTabs">
            <button class="filter-tab active" data-filter="all">Semua <span id="cnt-all" class="ml-1 text-xs bg-indigo-100 text-indigo-600 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="modern">Modern <span id="cnt-modern" class="ml-1 text-xs bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="islamic">Islami <span id="cnt-islamic" class="ml-1 text-xs bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="floral">Floral <span id="cnt-floral" class="ml-1 text-xs bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="rustic">Rustic <span id="cnt-rustic" class="ml-1 text-xs bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="boho terracotta">Boho <span id="cnt-boho-terracotta" class="ml-1 text-xs bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold"></span></button>
            <button class="filter-tab" data-filter="dark" style="color:#9333ea;">🌙 Dark <span id="cnt-dark" class="ml-1 text-xs bg-purple-100 text-purple-600 px-1.5 py-0.5 rounded-full font-bold"></span></button>
        </div>
        <div style="display:flex; gap:0.75rem; align-items:center;">
            <div class="filter-search">
                <svg width="18" height="18" fill="none" stroke="#9CA3AF" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" id="searchInput" placeholder="Cari tema...">
            </div>
            <select id="sortSelect" style="padding:0.625rem 1rem; border-radius:50px; border:none; background:white; font-size:0.875rem; font-family:inherit; color:#4B5563; box-shadow:0 2px 10px rgba(0,0,0,0.05); cursor:pointer; outline:none;">
                <option value="default">🔃 Urutkan</option>
                <option value="az">A → Z</option>
                <option value="za">Z → A</option>
                <option value="newest">Terbaru</option>
            </select>
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
                    'emerald-garden' => 'Islamic',
                    'floral-pastel' => 'Floral',
                    'rustic-green' => 'Rustic',
                    'royal-glass' => 'Modern',
                    'boho-terracotta' => 'Boho Terracotta',
                    'ocean-breeze' => 'Modern',
                    'watercolor-flow' => 'Modern',
                    'midnight-garden' => 'Dark',
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
                            <button onclick="openPreview('{{ route('demo.show', $theme->slug) }}', '{{ addslashes($theme->name) }}')" class="btn-preview">
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
                loader.style.opacity = '0';
                setTimeout(() => loader.classList.add('hidden'), 300);
            }
        };

        // Auto-open the invitation gate in iframe after the theme loads
        window.onFrameLoad = function () {
            window.hideLoader();
            setTimeout(() => {
                try {
                    const doc = frame.contentWindow.document;
                    // Try to click the 'Buka Undangan' button automatically
                    const openBtn = doc.querySelector('.btn-open, [onclick*="openInvitation"], [onclick*="buka"]');
                    if (openBtn) openBtn.click();
                } catch (e) { /* cross-origin or missing — ignored */ }
            }, 600);
        };

        window.openPreview = function (url, themeName) {
            if (loader) {
                loader.classList.remove('hidden');
                loader.style.opacity = '1';
            }
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                requestAnimationFrame(() => modal.style.opacity = '1');
                modal.style.transition = 'opacity 0.3s';
            }
            if (frame) { frame.src = url; }
            // Update theme name in header
            const nameEl = document.getElementById('previewThemeName');
            if (nameEl && themeName) nameEl.textContent = 'Preview: ' + themeName;
            // Update order button
            if (btnOrder && url) {
                const slug = url.split('/').pop();
                btnOrder.href = "{{ route('order.create') }}?theme=" + slug;
            }
            setDevice('mobile');
        };

        window.closePreview = function () {
            if (modal) {
                modal.style.opacity = '0';
                document.body.style.overflow = '';
                setTimeout(() => {
                    modal.classList.add('hidden');
                    if (frame) frame.src = '';
                }, 300);
            }
        };

        window.setDevice = function (type) {
            if (!frameWrapper || !frame) return;
            const vhFrame = 'calc(100vh - 110px)';

            const chromeTop = document.getElementById('phoneChromeTop');
            const chromeBot = document.getElementById('phoneChromeBottom');

            if (type === 'mobile') {
                frameWrapper.style.cssText = `
                    border-radius: 44px;
                    border: 12px solid #111;
                    box-shadow: 0 0 0 1px #333, 0 40px 80px rgba(0,0,0,0.6);
                    overflow: hidden;
                    transition: all 0.4s ease;
                `;
                frame.style.cssText = `width:375px; height:${vhFrame}; border-radius:32px; display:block;`;
                if (chromeTop) chromeTop.style.display = 'block';
                if (chromeBot) chromeBot.style.display = 'flex';
                // Highlight buttons
                btnMobile.className = 'px-3 py-2 rounded-lg text-xs font-semibold text-indigo-300 bg-indigo-600/30 border border-indigo-500/40 transition-all flex items-center gap-1.5';
                btnDesktop.className = 'px-3 py-2 rounded-lg text-xs font-semibold text-white/50 hover:text-white hover:bg-white/10 transition-all flex items-center gap-1.5';
            } else {
                frameWrapper.style.cssText = `
                    border-radius: 16px;
                    border: none;
                    box-shadow: 0 40px 80px rgba(0,0,0,0.5);
                    overflow: hidden;
                    transition: all 0.4s ease;
                `;
                frame.style.cssText = `width:min(1200px,92vw); height:${vhFrame}; border-radius:0; display:block;`;
                if (chromeTop) chromeTop.style.display = 'none';
                if (chromeBot) chromeBot.style.display = 'none';
                btnDesktop.className = 'px-3 py-2 rounded-lg text-xs font-semibold text-indigo-300 bg-indigo-600/30 border border-indigo-500/40 transition-all flex items-center gap-1.5';
                btnMobile.className = 'px-3 py-2 rounded-lg text-xs font-semibold text-white/50 hover:text-white hover:bg-white/10 transition-all flex items-center gap-1.5';
            }
        };

        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") closePreview();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.filter-tab');
            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const cards = Array.from(document.querySelectorAll('.theme-card'));
            const themesGrid = document.querySelector('.themes-grid');

            // ── Count badges per category ─────────────────────────────
            function updateCounts() {
                const allCards = document.querySelectorAll('.theme-card');
                const counts = { all: allCards.length };
                allCards.forEach(c => {
                    const cat = (c.getAttribute('data-category') || '').toLowerCase();
                    counts[cat] = (counts[cat] || 0) + 1;
                });
                document.querySelectorAll('.filter-tab').forEach(tab => {
                    const f = tab.getAttribute('data-filter');
                    const key = f === 'all' ? 'all' : f.toLowerCase();
                    const el = tab.querySelector('span');
                    if (el) el.textContent = counts[key] || 0;
                });
            }
            updateCounts();

            // ── Sort ──────────────────────────────────────────────────
            function sortCards(type) {
                if (!themesGrid) return;
                const sorted = [...cards];
                if (type === 'az') sorted.sort((a, b) => (a.dataset.name || '').localeCompare(b.dataset.name || ''));
                else if (type === 'za') sorted.sort((a, b) => (b.dataset.name || '').localeCompare(a.dataset.name || ''));
                else sorted.sort((a, b) => parseInt(a.dataset.order||0) - parseInt(b.dataset.order||0));
                sorted.forEach(c => themesGrid.appendChild(c));
            }
            // Record original order
            cards.forEach((c, i) => c.dataset.order = i);

            // ── Filter + Search ──────────────────────────────────────
            function filterThemes() {
                const activeTab = document.querySelector('.filter-tab.active');
                const category = (activeTab ? activeTab.getAttribute('data-filter') : 'all').toLowerCase();
                const searchTerm = (searchInput?.value || '').toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach(card => {
                    const cardCategory = (card.getAttribute('data-category') || '').toLowerCase();
                    const cardName = (card.getAttribute('data-name') || '').toLowerCase();
                    const matchesCategory = category === 'all' || cardCategory === category;
                    const matchesSearch = !searchTerm || cardName.includes(searchTerm);
                    if (matchesCategory && matchesSearch) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Empty state
                let emptyMsg = document.getElementById('dynamicEmpty');
                if (visibleCount === 0) {
                    if (!emptyMsg) {
                        emptyMsg = document.createElement('div');
                        emptyMsg.id = 'dynamicEmpty';
                        emptyMsg.className = 'empty-state';
                        themesGrid?.parentNode.appendChild(emptyMsg);
                    }
                    emptyMsg.innerHTML = `<div class="empty-state-icon">🔍</div><h3>Tidak Ada Hasil</h3><p>Coba kata kunci lain atau ganti kategori.</p>`;
                    emptyMsg.style.display = 'block';
                    if (themesGrid) themesGrid.style.display = 'none';
                } else {
                    if (emptyMsg) emptyMsg.style.display = 'none';
                    if (themesGrid) themesGrid.style.display = 'grid';
                }
            }

            // ── Event Listeners ───────────────────────────────────────
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    filterThemes();
                });
            });
            searchInput?.addEventListener('input', filterThemes);
            sortSelect?.addEventListener('change', function() {
                sortCards(this.value);
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
