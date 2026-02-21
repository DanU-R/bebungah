<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMANTEN - Undangan Digital Elegan untuk Momen Istimewa Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 48 48%22><rect width=%2248%22 height=%2248%22 rx=%2212%22 fill=%22%234F46E5%22/><path d=%22M15 13h18v6h-6v17h-6v-17h-6v-6z%22 fill=%22white%22/></svg>">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --secondary: #EC4899;
            --accent: #F59E0B;
        }
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        
        /* Smooth Blob Animations */
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(40px, -60px) scale(1.15); }
            50% { transform: translate(-30px, 40px) scale(0.95); }
            75% { transform: translate(50px, 20px) scale(1.08); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .animate-blob { animation: blob 8s infinite ease-in-out; }
        .animate-float { animation: float 6s infinite ease-in-out; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out; }
        .animate-scaleIn { animation: scaleIn 0.6s ease-out; }
        
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #4F46E5; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4338CA; }
        
        /* Smooth transitions */
        * { transition-property: transform, opacity, background-color, border-color, color, box-shadow; }
        
        /* Phone mockup improvements */
        .phone-shadow {
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(0, 0, 0, 0.1);
        }
        
        /* Button hover effects */
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
        
        /* Card hover effects */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
        }
        
        /* Premium badge pulse */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(251, 191, 36, 0.5); }
            50% { box-shadow: 0 0 30px rgba(251, 191, 36, 0.8); }
        }
        
        .premium-badge {
            animation: pulse-glow 2s infinite;
        }
        
        /* Nav blur effect on scroll */
        .nav-scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-indigo-50/30 text-gray-800 antialiased overflow-x-hidden">

    <!-- Preview Modal - Enhanced -->
    <div id="previewModal" class="fixed inset-0 z-[100] hidden bg-gradient-to-br from-gray-900/98 via-indigo-900/95 to-purple-900/98 backdrop-blur-xl transition-all duration-500 opacity-0 flex flex-col">
    
        <!-- Modal Header - Enhanced -->
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

        <!-- Modal Content - Enhanced -->
        <div class="flex-1 flex items-center justify-center overflow-hidden relative p-6" onclick="closePreview()">
            
            <!-- Loader - Enhanced -->
            <div id="loader" class="absolute inset-0 flex flex-col items-center justify-center z-0 pointer-events-none gap-4">
                <div class="relative">
                    <div class="animate-spin rounded-full h-16 w-16 border-4 border-indigo-500/30 border-t-indigo-500"></div>
                    <div class="absolute inset-0 animate-ping rounded-full h-16 w-16 border-4 border-indigo-500/20"></div>
                </div>
                <p class="text-white/60 text-sm font-medium">Memuat preview...</p>
            </div>

            <!-- Frame Wrapper - Enhanced -->
            <div id="frameWrapper" class="relative bg-white shadow-2xl transition-all duration-700 ease-in-out z-10 rounded-3xl" onclick="event.stopPropagation()">
                
                <div id="phoneNotch" class="absolute top-0 left-1/2 transform -translate-x-1/2 w-[140px] h-[32px] bg-gray-900 rounded-b-3xl z-30 pointer-events-none transition-opacity duration-300"></div>

                <iframe id="previewFrame" src="" class="w-full h-full bg-white rounded-3xl" frameborder="0" onload="if(window.hideLoader) window.hideLoader()"></iframe>

            </div>
        </div>
    </div>

    <!-- Navigation - Enhanced -->
    <nav id="mainNav" class="fixed w-full z-50 glass border-b border-gray-100/50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-5 flex justify-between items-center">
            
            <!-- Logo - Enhanced -->
            <a href="#" class="flex items-center gap-3 group">
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

            <!-- Nav Links - Enhanced -->
            <div class="hidden md:flex items-center gap-10 text-sm font-semibold text-gray-600">
                <a href="#fitur" class="hover:text-indigo-600 transition-all duration-300 hover:scale-105 relative group">
                    Fitur
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('themes.index') }}" class="hover:text-indigo-600 transition-all duration-300 hover:scale-105 relative group">
                    Katalog Tema
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>

            <!-- CTA Buttons - Enhanced -->
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

    <!-- Hero Section - Enhanced -->
    <section class="pt-40 pb-28 px-6 relative overflow-hidden">
        <!-- Animated Background Blobs - Enhanced -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
            <div class="absolute top-10 left-1/4 w-96 h-96 bg-gradient-to-br from-purple-300 to-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
            <div class="absolute top-20 right-1/4 w-96 h-96 bg-gradient-to-br from-yellow-300 to-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/3 w-96 h-96 bg-gradient-to-br from-pink-300 to-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Hero Text - Enhanced -->
            <div class="text-center lg:text-left z-10 space-y-8 animate-fadeInUp">
                <div class="inline-flex items-center gap-2 bg-indigo-50 border border-indigo-100 px-4 py-2 rounded-full text-indigo-700 text-sm font-semibold shadow-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>Platform Undangan Digital Terpercaya</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-7xl font-extrabold text-gray-900 leading-[1.1] tracking-tight">
                    Bagikan Momen<br>
                    <span class="font-serif italic gradient-text">Bahagiamu</span>
                </h1>
                
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0 font-medium">
                    Ciptakan undangan pernikahan digital yang <span class="text-indigo-600 font-bold">elegan & modern</span> dalam hitungan menit. Fitur lengkap, desain premium, harga terjangkau.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start pt-4">
                    <a href="#tema" class="group btn-primary relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-10 py-5 rounded-full font-bold text-lg shadow-2xl shadow-indigo-300 hover:shadow-indigo-400 hover:scale-105 transition-all duration-300 flex items-center justify-center gap-3">
                        <span class="relative z-10">Pilih Tema Favorit</span>
                        <svg class="w-6 h-6 group-hover:translate-y-1 transition-transform relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </a>
                    <a href="#fitur" class="group bg-white text-gray-900 px-10 py-5 rounded-full font-bold text-lg border-2 border-gray-200 hover:border-indigo-600 hover:text-indigo-600 transition-all duration-300 flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:scale-105">
                        <span>Lihat Fitur</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <!-- Stats - New -->
                <div class="grid grid-cols-3 gap-6 pt-8 max-w-lg mx-auto lg:mx-0">
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-extrabold text-indigo-600">100%</div>
                        <div class="text-sm text-gray-500 font-medium mt-1">Digital & Paperless</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-extrabold text-indigo-600">RSVP</div>
                        <div class="text-sm text-gray-500 font-medium mt-1">Konfirmasi Kehadiran Online</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-extrabold text-indigo-600">Music</div>
                        <div class="text-sm text-gray-500 font-medium mt-1">Auto-Play Backsound Romantis</div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Phone Mockup - Enhanced -->
            <div class="relative z-10 flex justify-center lg:justify-end animate-scaleIn">
                <div class="relative animate-float">
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-24 h-24 bg-gradient-to-br from-yellow-400 to-pink-500 rounded-full opacity-20 blur-2xl"></div>
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full opacity-20 blur-2xl"></div>
                    
                    <!-- Phone Device -->
                    <div class="relative mx-auto border-gray-800 bg-gray-900 border-[14px] rounded-[3rem] h-[650px] w-[320px] phone-shadow hover:scale-105 transition-all duration-700 group">
                        <!-- Side Buttons -->
                        <div class="h-[32px] w-[3px] bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg"></div>
                        <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
                        <div class="h-[64px] w-[3px] bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg"></div>
                        
                    <!-- Screen Content -->
                    @php $heroTheme = \App\Models\Theme::where('is_active', true)->first(); @endphp
                    <div class="rounded-[2.5rem] overflow-hidden w-full h-full bg-white relative">
                        <img src="{{ asset('assets/thumbnail/' . ($heroTheme->slug ?? 'floral-pastel') . '.png') }}" 
                            alt="Preview {{ $heroTheme->name ?? 'Tema' }}" 
                            class="w-full h-full object-cover">

                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-end p-8">
                            <button onclick="openPreview('{{ route('demo.show', $heroTheme->slug ?? 'floral-pastel') }}')" class="bg-white text-gray-900 px-8 py-3.5 rounded-full font-bold text-base shadow-2xl hover:scale-105 transition-all transform flex items-center gap-3 mb-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Lihat Demo Interaktif
                            </button>
                            <p class="text-white/90 text-sm font-medium">Klik untuk preview lengkap</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Theme Gallery Section - Enhanced -->
    <section id="tema" class="py-32 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header - Enhanced -->
            <div class="text-center mb-20 space-y-5 animate-fadeInUp">
                <div class="inline-flex items-center gap-2 bg-indigo-50 border border-indigo-100 px-4 py-2 rounded-full text-indigo-700 text-sm font-semibold">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                    <span>Koleksi Tema Premium</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                    Tema <span class="font-serif italic gradient-text">Eksklusif</span> untuk Anda
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Desain mobile-first yang memukau di setiap layar smartphone. Pilih tema yang mencerminkan kepribadian Anda.
                </p>
            </div>

            <!-- Theme Cards Grid — Dynamic dari Database -->
            @php
                $catalogThemes = \App\Models\Theme::where('is_active', true)->orderBy('id')->take(3)->get();
                $rotations = ['-rotate-3 md:-rotate-6 group-hover:rotate-0', '', 'rotate-3 md:rotate-6 group-hover:rotate-0'];
                $delays = ['', 'animation-delay-200', 'animation-delay-400'];
                $featured = [false, true, false];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16 place-items-center">
                @foreach($catalogThemes as $i => $theme)
                @php
                    $rotation = $rotations[$i] ?? '';
                    $delay    = $delays[$i] ?? '';
                    $isFeatured = $featured[$i] ?? false;
                    $thumbnail = asset('assets/thumbnail/' . $theme->slug . '.png');
                @endphp
                <div class="flex flex-col items-center group w-full max-w-sm {{ $isFeatured ? 'relative md:-top-16' : '' }} animate-fadeInUp {{ $delay }}">
                    <div class="relative card-hover w-full">
                        <div class="relative mx-auto border-gray-900 bg-gradient-to-b from-gray-800 to-gray-900 border-[14px] rounded-[3rem] h-[560px] w-[280px] phone-shadow transform {{ $rotation }} {{ $isFeatured ? 'scale-110 hover:scale-[1.15] ring-4 ring-indigo-200/50' : '' }}">
                            <!-- Side Buttons -->
                            <div class="h-[32px] w-[3px] bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg"></div>
                            <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
                            <div class="h-[64px] w-[3px] bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg"></div>

                            <!-- Screen -->
                            <div class="rounded-[2.5rem] overflow-hidden w-full h-full bg-white relative">
                                <img src="{{ $thumbnail }}" alt="{{ $theme->name }}" class="w-full h-full object-cover">

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 via-indigo-600/40 to-transparent backdrop-blur-[2px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 gap-4 p-6">
                                    <div class="text-white text-center space-y-2 mb-4">
                                        <div class="text-2xl font-bold">{{ $theme->name }}</div>
                                        <div class="text-sm opacity-90">Klik untuk melihat preview</div>
                                    </div>
                                    <button onclick="openPreview('{{ route('demo.show', $theme->slug) }}')" class="bg-white text-gray-900 px-8 py-3 rounded-full font-bold text-sm hover:bg-indigo-50 transition-all transform hover:scale-105 flex items-center gap-2 shadow-2xl">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        Live Preview
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if($isFeatured)
                        <!-- Premium Badge -->
                        <div class="absolute -top-6 -right-6 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-black px-4 py-2 rounded-full shadow-2xl rotate-12 z-20 premium-badge flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            POPULER
                        </div>
                        @endif
                    </div>

                    <!-- Theme Info -->
                    <div class="mt-10 text-center px-4 relative z-10 space-y-4 w-full">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $theme->name }}</h3>
                        <div class="flex items-center justify-center gap-6 pt-2">
                            <div class="text-center">
                                <div class="text-3xl font-extrabold text-gray-900">{{ $theme->short_price }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $isFeatured ? 'Tema terpopuler' : 'Harga spesial' }}</div>
                            </div>
                            <a href="{{ route('order.create') }}?theme={{ $theme->slug }}" class="text-sm font-bold border-2 {{ $isFeatured ? 'border-indigo-600 bg-indigo-600 text-white hover:bg-indigo-700 hover:border-indigo-700' : 'border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white' }} px-6 py-3 rounded-full transition-all duration-300 uppercase tracking-widest hover:scale-105 shadow-lg hover:shadow-xl">
                                Pilih Tema
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- View More CTA - Enhanced -->
            <div class="mt-24 text-center relative z-20 space-y-6">
                <a href="{{ route('themes.index') }}" class="group inline-flex items-center gap-4 bg-white border-2 border-gray-200 px-10 py-5 rounded-full font-bold text-gray-700 hover:border-indigo-600 hover:text-indigo-600 transition-all duration-500 shadow-xl hover:shadow-2xl hover:scale-105">
                    <span class="text-lg">Jelajahi Koleksi Lengkap</span>
                    <div class="bg-gradient-to-r from-indigo-100 to-purple-100 group-hover:from-indigo-600 group-hover:to-purple-600 rounded-full p-2 transition-all duration-300">
                        <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </a>
                <p class="text-base text-gray-500 font-medium">
                    Menampilkan <span class="font-bold text-indigo-600">3 dari {{ \App\Models\Theme::count() }}+</span> Tema Premium Eksklusif
                </p>
            </div>

        </div>
    </section>

    <!-- Features Section - Enhanced -->
    <section id="fitur" class="py-28 bg-white relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-indigo-50 to-transparent opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <!-- Section Header - Enhanced -->
            <div class="text-center mb-20 space-y-5">
                <div class="inline-flex items-center gap-2 bg-indigo-50 border border-indigo-100 px-4 py-2 rounded-full text-indigo-700 text-sm font-semibold">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                    <span>Fitur Unggulan</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                    Semua yang Anda <span class="font-serif italic gradient-text">Butuhkan</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Platform lengkap dengan fitur premium untuk undangan pernikahan digital yang sempurna
                </p>
            </div>

            <!-- Features Grid - Enhanced -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-12">
                
                <!-- Feature 1 -->
                <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl border-2 border-gray-100 hover:border-indigo-200 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 space-y-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-100 to-indigo-200 text-indigo-600 rounded-2xl flex items-center justify-center text-4xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                        ⚡
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-bold text-2xl text-gray-900 group-hover:text-indigo-600 transition-colors">Proses Super Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">Undangan langsung aktif setelah pembayaran terverifikasi. Edit data kapan saja tanpa batasan waktu.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl border-2 border-gray-100 hover:border-purple-200 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 space-y-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 text-purple-600 rounded-2xl flex items-center justify-center text-4xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                        📱
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-bold text-2xl text-gray-900 group-hover:text-purple-600 transition-colors">100% Mobile Friendly</h3>
                        <p class="text-gray-600 leading-relaxed">Tampilan responsif sempurna di semua perangkat. Loading cepat dan pengalaman browsing yang mulus.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 bg-gradient-to-br from-white to-gray-50 rounded-3xl border-2 border-gray-100 hover:border-pink-200 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 space-y-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-pink-100 to-pink-200 text-pink-600 rounded-2xl flex items-center justify-center text-4xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                        💌
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-bold text-2xl text-gray-900 group-hover:text-pink-600 transition-colors">Unlimited Undangan</h3>
                        <p class="text-gray-600 leading-relaxed">Bagikan ke sebanyak mungkin teman dan kerabat tanpa batasan jumlah.</p>
                    </div>
                </div>

            </div>

            <!-- Additional Features List - New -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center space-y-3">
                    <div class="text-3xl">🎵</div>
                    <div class="font-semibold text-gray-900">Background Music</div>
                    <div class="text-sm text-gray-500">Musik latar otomatis</div>
                </div>
                <div class="text-center space-y-3">
                    <div class="text-3xl">📸</div>
                    <div class="font-semibold text-gray-900">Galeri Foto</div>
                    <div class="text-sm text-gray-500">Upload foto unlimited</div>
                </div>
                <div class="text-center space-y-3">
                    <div class="text-3xl">💬</div>
                    <div class="font-semibold text-gray-900">Buku Tamu Digital</div>
                    <div class="text-sm text-gray-500">Ucapan dari tamu</div>
                </div>
                <div class="text-center space-y-3">
                    <div class="text-3xl">🗺️</div>
                    <div class="font-semibold text-gray-900">Google Maps</div>
                    <div class="text-sm text-gray-500">Lokasi akurat</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section - New -->
    <section class="py-28 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center relative z-10 space-y-10">
            <h2 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">
                Siap Membuat Undangan <br class="hidden md:block"/>
                <span class="font-serif italic">Impian Anda?</span>
            </h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto leading-relaxed">
                Bergabunglah dengan ratusan pasangan yang telah mempercayai kami untuk momen spesial mereka
            </p>
            <div class="flex flex-col sm:flex-row gap-5 justify-center pt-6">
                <a href="#tema" class="bg-white text-indigo-600 px-10 py-5 rounded-full font-bold text-lg shadow-2xl hover:shadow-white/30 hover:scale-105 transition-all duration-300 flex items-center justify-center gap-3">
                    <span>Mulai Sekarang</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#tema" class="bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-white/20 transition-all duration-300 flex items-center justify-center gap-3 hover:scale-105">
                    <span>Lihat Demo</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </a>
            </div>
            
            <!-- Trust Indicators -->
            <div class="grid grid-cols-3 gap-8 pt-12 max-w-3xl mx-auto border-t border-white/20">
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-white">Premium</div>
                    <div class="text-white/70 text-sm mt-2">Pilihan Desain Eksklusif</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-white">Aman</div>
                    <div class="text-white/70 text-sm mt-2">Data Privasi Terjaga</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-extrabold text-white">Fast Respon</div>
                    <div class="text-white/70 text-sm mt-2">Siap Membantu Anda</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Enhanced -->
    <footer class="bg-gradient-to-b from-gray-900 to-black text-white relative overflow-hidden">
        <!-- Decorative Top Border -->
        <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
        
        <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">
            <!-- Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                
                <!-- Brand Column -->
                <div class="space-y-6 md:col-span-2">
                    <div class="flex items-center gap-3">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-12 h-12">
                            <rect width="48" height="48" rx="12" fill="url(#footerGradient)" />
                            <defs>
                                <linearGradient id="footerGradient" x1="0" y1="0" x2="48" y2="48">
                                    <stop offset="0%" stop-color="#667eea"/>
                                    <stop offset="100%" stop-color="#764ba2"/>
                                </linearGradient>
                            </defs>
                            <path d="M15 13h18v6h-6v17h-6v-17h-6v-6z" fill="white" /> 
                        </svg>
                        <div>
                            <h2 class="font-extrabold text-2xl">TEMANTEN</h2>
                            <p class="text-xs text-gray-400 tracking-wider uppercase">Digital Invitation</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-md">
                        Platform pembuatan undangan pernikahan digital terpercaya #1 di Indonesia. Wujudkan undangan impian Anda bersama kami.
                    </p>
                    <!-- Social Media -->
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-white/10 rounded-full flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-white/10 rounded-full flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 hover:bg-white/10 rounded-full flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="font-bold text-lg mb-6">Navigasi</h3>
                    <div class="space-y-3">
                        <a href="#fitur" class="block text-gray-400 hover:text-white transition-colors">Fitur</a>
                        <a href="#tema" class="block text-gray-400 hover:text-white transition-colors">Katalog Tema</a>
                        <a href="#harga" class="block text-gray-400 hover:text-white transition-colors">Harga</a>
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">Tentang Kami</a>
                    </div>
                </div>

                <!-- Support -->
                <div class="space-y-4">
                    <h3 class="font-bold text-lg mb-6">Bantuan</h3>
                    <div class="space-y-3">
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">FAQ</a>
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">Hubungi Kami</a>
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">Panduan</a>
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm text-center md:text-left">
                        &copy; {{ date('Y') }} <span class="font-semibold text-white">TEMANTEN</span> Digital Invitation. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript - Enhanced -->
    <script>
    // Cache DOM elements
    const modal = document.getElementById('previewModal');
    const frame = document.getElementById('previewFrame');
    const loader = document.getElementById('loader');
    const frameWrapper = document.getElementById('frameWrapper');
    const phoneNotch = document.getElementById('phoneNotch');
    const btnMobile = document.getElementById('btnMobile');
    const btnDesktop = document.getElementById('btnDesktop');
    const btnOrder = document.getElementById('btnOrderTheme');
    const mainNav = document.getElementById('mainNav');

    // Navbar scroll effect
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            mainNav.classList.add('nav-scrolled', 'py-3');
            mainNav.classList.remove('py-5');
        } else {
            mainNav.classList.remove('nav-scrolled', 'py-3');
            mainNav.classList.add('py-5');
        }
        
        lastScroll = currentScroll;
    });

    // Hide loader function
    window.hideLoader = function () {
        if (loader) {
            loader.classList.add('opacity-0');
            setTimeout(() => loader.classList.add('hidden'), 300);
        }
    };

    // Open preview modal
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

    // Close preview modal
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

    // Set device preview mode
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

    // Highlight active button
    function highlightBtn(active, inactive) {
        if (active) {
            active.className = "group p-3 rounded-lg text-indigo-300 bg-white/15 transition-all";
        }
        if (inactive) {
            inactive.className = "group p-3 rounded-lg text-white/50 hover:text-white/90 hover:bg-white/10 transition-all";
        }
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape") closePreview();
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Intersection Observer for animations on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('section > div > div').forEach(el => {
        observer.observe(el);
    });
    </script>

</body>
</html>