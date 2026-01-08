<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $invitation->content['mempelai']['pria']['nama'] }} & {{ $invitation->content['mempelai']['wanita']['nama'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Jost:wght@300;400;500&family=Pinyon+Script&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Color Palette */
        :root {
            --sage-dark: #4A5D4E;
            --sage-medium: #8FA392;
            --sage-light: #E4EBE5;
            --sage-bg: #F0F4F1;
            --gold: #C0A674;
        }

        body { 
            font-family: 'Jost', sans-serif; 
            background-color: var(--sage-bg); 
            color: var(--sage-dark);
            overflow-x: hidden;
        }

        h1, h2, h3 { font-family: 'Italiana', serif; }
        .font-script { font-family: 'Pinyon Script', cursive; }
        
        /* MODERN GLASSMORPHISM CARD */
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(86, 104, 88, 0.1);
        }

        /* ANIMATED BACKGROUND (Floating Leaves) */
        .leaf-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }
        .leaf {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px; height: 20px;
            background: rgba(143, 163, 146, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50% 0 50% 0; /* Bentuk Daun */
        }
        .leaf:nth-child(1){ left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .leaf:nth-child(2){ left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .leaf:nth-child(3){ left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .leaf:nth-child(4){ left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .leaf:nth-child(5){ left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .leaf:nth-child(6){ left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        
        @keyframes animate {
            0%{ transform: translateY(0) rotate(0deg); opacity: 0; }
            10%{ opacity: 1; }
            100%{ transform: translateY(-1000px) rotate(720deg); opacity: 0; }
        }

        /* KEN BURNS EFFECT (Zoom in background) */
        .ken-burns {
            animation: kenBurns 20s ease-in-out infinite alternate;
        }
        @keyframes kenBurns {
            from { transform: scale(1); }
            to { transform: scale(1.15); }
        }

        /* ARCH IMAGE MODERN */
        .arch-modern {
            border-radius: 300px 300px 20px 20px;
            box-shadow: 0 20px 40px -10px rgba(86, 104, 88, 0.3);
            transition: transform 0.5s;
        }
        .arch-modern:hover { transform: translateY(-10px); }

        /* [PERBAIKAN] ARCH COVER RESPONSIVE */
        /* Agar muat di HP, ukurannya kita kecilkan sedikit */
        .arch-cover {
            border-radius: 100px 100px 0 0;
            overflow: hidden;
            width: 150px;  /* Ukuran Mobile */
            height: 220px; /* Ukuran Mobile */
            margin: 0 auto;
            border: 4px solid rgba(255,255,255,0.8);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            transition: all 0.5s ease;
        }
        .arch-cover img { width: 100%; height: 100%; object-fit: cover; }

        /* Ukuran Laptop/Tablet lebih besar */
        @media (min-width: 768px) {
            .arch-cover {
                width: 220px;
                height: 300px;
            }
        }

        /* MUSIC SPIN */
        .spin-slow { animation: spin 8s linear infinite; }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        
        /* HIDE SCROLLBAR */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--sage-medium); border-radius: 10px; }
    </style>
</head>
<body>

    <ul class="leaf-bg">
        <li class="leaf"></li><li class="leaf"></li><li class="leaf"></li>
        <li class="leaf"></li><li class="leaf"></li><li class="leaf"></li>
    </ul>

    <div id="music-container" class="fixed bottom-6 right-6 z-[100] hidden">
        <audio id="bg-music" loop>
            <source src="{{ isset($invitation->content['media']['music']) ? asset('storage/'.$invitation->content['media']['music']) : asset('assets/music/Leftover Fries.mp3') }}" type="audio/mp3">
        </audio>
        <button onclick="toggleMusic()" class="w-12 h-12 bg-white/80 backdrop-blur border border-[#566858] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition duration-300">
            <svg id="music-icon" class="w-5 h-5 text-[#566858] spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
        </button>
    </div>

    <div id="cover" class="fixed inset-0 z-50 flex flex-col items-center justify-between text-center transition-transform duration-1000 bg-[#F0F4F1] overflow-hidden">       
        <div class="absolute inset-0 z-0">
             <img src="{{ asset('assets/bg.png') }}" 
                  class="absolute inset-0 w-full h-full object-cover ken-burns opacity-40" 
                  alt="Background Decoration">

             <div class="absolute inset-0 bg-gradient-to-b from-[#F0F4F1]/80 via-[#F0F4F1]/20 to-[#F0F4F1]"></div>
        </div>

        <div class="relative z-10 w-full px-6 pt-8 md:pt-12">
            <p class="uppercase tracking-[0.4em] text-xs font-bold text-[#566858] mb-2 md:mb-4 drop-shadow-sm" data-aos="fade-down">The Wedding Of</p>
            
            <h1 class="text-5xl md:text-8xl font-script text-[#4A5D4E] drop-shadow-md" data-aos="zoom-in" data-aos-duration="1500">
                {{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} 
                <span class="text-3xl">&</span> 
                {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}
            </h1>

            <div class="mt-6" data-aos="fade-up" data-aos-delay="800">
                <p class="text-[#566858] text-sm md:text-lg tracking-[0.3em] font-medium border-y border-[#566858]/30 inline-block py-2 px-6">
                    {{ $invitation->event_date->format('d . m . Y') }}
                </p>
            </div>
        </div>

        <div class="relative z-10 my-auto" data-aos="zoom-in" data-aos-duration="1500">
            <div class="arch-cover bg-white/30 backdrop-blur-sm">
                @if($invitation->content['media']['cover'])
                    <img src="{{ asset('storage/'.$invitation->content['media']['cover']) }}">
                @else
                    <img src="https://via.placeholder.com/300x500?text=Foto+Pasangan" class="grayscale opacity-50">
                @endif
            </div>
        </div>

        <div class="relative z-10 w-full pb-8 md:pb-12 px-6 flex flex-col items-center">
            @if($guest)
                <div class="glass-card px-6 py-2 md:px-8 md:py-3 rounded-2xl mb-4 md:mb-6 transform hover:scale-105 transition duration-300">
                    <p class="text-[10px] md:text-xs text-gray-600 mb-1">Kepada Yth:</p>
                    <h3 class="font-bold text-lg text-[#2F4F38]">{{ $guest->name }}</h3>
                    @if($guest->category)
                        <span class="inline-block mt-1 px-3 py-0.5 bg-[#566858] text-white text-[10px] rounded-full tracking-wider">{{ $guest->category }}</span>
                    @endif
                </div>
            @endif

            <button onclick="openInvitation()" class="group relative px-8 py-3 bg-[#4A5D4E] text-white rounded-full text-xs font-bold uppercase tracking-widest shadow-xl hover:bg-[#2F4F38] transition-all overflow-hidden animate-bounce">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path></svg>
                    Buka Undangan
                </span>
            </button>
        </div>
    </div>

    <div id="content" class="hidden opacity-0 transition-opacity duration-1000">

        <header class="h-[70vh] relative overflow-hidden flex items-center justify-center">
            <div class="absolute inset-0">
                <img src="{{ $invitation->content['media']['cover'] ? asset('storage/'.$invitation->content['media']['cover']) : 'https://images.unsplash.com/photo-1606216794074-735e91aa2c92?q=80&w=1000' }}" 
                    class="w-full h-full object-cover object-top">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            
            <div class="relative z-10 text-center text-white px-4" data-aos="fade-up">
                <p class="uppercase tracking-[0.4em] text-xs mb-2">We Are Getting Married</p>
                <h1 class="text-5xl md:text-7xl font-script mb-4">{{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} & {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}</h1>
                <p class="inline-block border-y border-white/50 py-2 px-6 text-sm tracking-widest backdrop-blur-sm">{{ $invitation->event_date->format('d . m . Y') }}</p>
            </div>
            
            <div class="absolute bottom-0 w-full leading-none">
                <svg class="block w-full h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#F0F4F1]"></path>
                </svg>
            </div>
        </header>

        <section class="py-20 px-6 text-center max-w-2xl mx-auto">
             <div data-aos="fade-up">
                 <img src="https://img.icons8.com/ios/50/mosque.png" class="w-20 mx-auto mb-6 opacity-70">
                 <h2 class="text-3xl text-[#566858] mb-6">Assalamu'alaikum</h2>
                 <p class="text-gray-600 leading-relaxed italic mb-6 text-lg">
                     "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."
                 </p>
                 <span class="inline-block bg-[#E4EBE5] px-4 py-1 rounded-full text-[#566858] font-bold text-xs uppercase tracking-widest">(Q.S Ar-Rum: 21)</span>
             </div>
        </section>

        <section class="py-12 px-4">
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
                
                <div class="glass-card p-8 rounded-[40px] text-center transform hover:-translate-y-2 transition duration-500" data-aos="fade-right">
                    <div class="w-full aspect-[3/4] arch-modern overflow-hidden mb-6 relative">
                        @if(isset($invitation->content['mempelai']['pria']['foto']))
                            <img src="{{ asset('storage/'.$invitation->content['mempelai']['pria']['foto']) }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/300x400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-4">
                            <h3 class="text-3xl font-script text-white">{{ $invitation->content['mempelai']['pria']['nama'] }}</h3>
                        </div>
                    </div>
                    <p class="text-xs text-[#566858] font-bold uppercase tracking-widest mb-2">Mempelai Pria</p>
                    <p class="text-sm text-gray-500">Putra Bpk. {{ $invitation->content['mempelai']['pria']['ayah'] }} <br> & Ibu {{ $invitation->content['mempelai']['pria']['ibu'] }}</p>
                </div>

                <div class="glass-card p-8 rounded-[40px] text-center transform hover:-translate-y-2 transition duration-500" data-aos="fade-left">
                    <div class="w-full aspect-[3/4] arch-modern overflow-hidden mb-6 relative">
                        @if(isset($invitation->content['mempelai']['wanita']['foto']))
                            <img src="{{ asset('storage/'.$invitation->content['mempelai']['wanita']['foto']) }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/300x400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-4">
                            <h3 class="text-3xl font-script text-white">{{ $invitation->content['mempelai']['wanita']['nama'] }}</h3>
                        </div>
                    </div>
                    <p class="text-xs text-[#566858] font-bold uppercase tracking-widest mb-2">Mempelai Wanita</p>
                    <p class="text-sm text-gray-500">Putri Bpk. {{ $invitation->content['mempelai']['wanita']['ayah'] }} <br> & Ibu {{ $invitation->content['mempelai']['wanita']['ibu'] }}</p>
                </div>

            </div>
        </section>

        @if(isset($invitation->content['love_stories']) && count($invitation->content['love_stories']) > 0)
        <section class="py-24 px-6 bg-[#E4EBE5] relative">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl text-[#2F4F38] mb-2 font-script">Kisah Cinta Kami</h2>
                <div class="w-16 h-1 bg-[#8FA392] mx-auto rounded-full"></div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                @foreach($invitation->content['love_stories'] as $index => $story)
                    @if(!empty($story['title']) && !empty($story['content']))
                    <div class="flex flex-col md:flex-row gap-8 items-center {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }}" data-aos="fade-up">
                        <div class="w-full md:w-1/2">
                            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg border-4 border-white transform hover:rotate-2 transition duration-500">
                                <img src="{{ isset($story['image']) ? asset('storage/'.$story['image']) : 'https://via.placeholder.com/400x300' }}" class="w-full h-full object-cover hover:scale-110 transition duration-700">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 text-center md:text-left">
                            <span class="bg-[#566858] text-white px-3 py-1 text-xs font-bold rounded-full mb-3 inline-block">{{ $story['year'] }}</span>
                            <h3 class="text-2xl font-serif text-[#2F4F38] mb-3">{{ $story['title'] }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $story['content'] }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </section>
        @endif

        <section class="py-24 px-6 relative">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[80%] bg-[#8FA392] opacity-10 rounded-full blur-3xl -z-10"></div>

            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl text-[#2F4F38] mb-2">Save The Date</h2>
                <p class="text-gray-500 italic">Kami menantikan kehadiran Anda</p>
            </div>

            <div id="countdown" class="flex flex-wrap justify-center gap-4 mb-16 text-[#2F4F38]" data-aos="zoom-in">
                <div class="glass-card w-20 h-24 flex flex-col items-center justify-center rounded-2xl">
                    <span id="days" class="text-2xl font-bold">00</span><span class="text-[10px] uppercase">Hari</span>
                </div>
                <div class="glass-card w-20 h-24 flex flex-col items-center justify-center rounded-2xl">
                    <span id="hours" class="text-2xl font-bold">00</span><span class="text-[10px] uppercase">Jam</span>
                </div>
                <div class="glass-card w-20 h-24 flex flex-col items-center justify-center rounded-2xl">
                    <span id="minutes" class="text-2xl font-bold">00</span><span class="text-[10px] uppercase">Menit</span>
                </div>
                <div class="glass-card w-20 h-24 flex flex-col items-center justify-center rounded-2xl">
                    <span id="seconds" class="text-2xl font-bold">00</span><span class="text-[10px] uppercase">Detik</span>
                </div>
            </div>

            <div class="max-w-2xl mx-auto glass-card rounded-[3rem] p-10 text-center border-t-8 border-[#566858]" data-aos="fade-up">
                <h3 class="text-2xl font-serif text-[#566858] mb-6">Resepsi Pernikahan</h3>
                <div class="flex items-center justify-center gap-4 mb-6">
                    <div class="h-px bg-gray-300 w-12"></div>
                    <img src="https://cdn-icons-png.flaticon.com/512/9187/9187595.png" class="w-8 opacity-50">
                    <div class="h-px bg-gray-300 w-12"></div>
                </div>
                
                <p class="text-5xl font-script text-[#C0A674] mb-2">{{ $invitation->event_date->format('l') }}</p>
                <p class="text-gray-800 font-bold text-xl mb-6">{{ $invitation->event_date->format('d F Y') }}</p>
                <p class="text-gray-500 mb-8">Pukul 09.00 WIB - Selesai</p>
                
                <div class="bg-[#F0F4F1] p-6 rounded-2xl mb-8">
                    <p class="font-bold text-xs uppercase text-[#566858] mb-2">Bertempat di</p>
                    <p class="text-gray-700 leading-relaxed">{{ $invitation->content['acara']['alamat'] }}</p>
                </div>
                
                <a href="{{ $invitation->content['acara']['maps_link'] }}" target="_blank" class="inline-flex items-center gap-2 bg-[#566858] text-white px-8 py-3 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-[#2F4F38] transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Google Maps
                </a>
            </div>
        </section>

        <section class="py-20 px-6 bg-[#E4EBE5]">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                
                @if(isset($invitation->content['amplop']['bank_name']) && $invitation->content['amplop']['bank_name'])
                <div class="glass-card p-10 rounded-3xl text-center h-full flex flex-col justify-center" data-aos="fade-right">
                    <h2 class="text-3xl font-serif text-[#566858] mb-6">Wedding Gift</h2>
                    <p class="text-gray-500 text-sm mb-8">Doa restu Anda adalah hadiah terindah bagi kami.</p>
                    
                    <div class="relative bg-gradient-to-br from-[#566858] to-[#2F4F38] p-6 rounded-2xl text-white shadow-lg mx-auto w-full max-w-sm">
                        <div class="flex justify-between items-center mb-8">
                            <span class="text-xs uppercase tracking-widest opacity-70">Debit Card</span>
                            <span class="font-bold italic">{{ $invitation->content['amplop']['bank_name'] }}</span>
                        </div>
                        <p class="text-2xl font-mono tracking-widest mb-4" id="nomorRekening">{{ $invitation->content['amplop']['account_number'] }}</p>
                        <div class="flex justify-between items-end">
                            <p class="text-xs opacity-70">CARD HOLDER</p>
                            <p class="font-bold uppercase">{{ $invitation->content['amplop']['account_holder'] }}</p>
                        </div>
                    </div>
                    
                    <button onclick="salinRekening()" class="mt-8 text-xs font-bold text-[#566858] hover:text-[#2F4F38] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                        Salin Nomor Rekening
                    </button>
                </div>
                @endif

                <div class="glass-card p-8 rounded-3xl h-full" data-aos="fade-left">
                    <h3 class="text-center text-xl font-serif text-[#566858] mb-6">Ucapan & Konfirmasi</h3>
                    
                    @if($guest)
                    <form action="{{ route('invitation.rsvp', $guest->id) }}" method="POST" class="mb-8 space-y-4">
                        @csrf
                        <div class="flex gap-4">
                            <input type="text" value="{{ $guest->name }}" class="w-1/2 bg-white/50 border-0 rounded-xl p-3 text-sm font-bold text-gray-600" readonly>
                            <select name="rsvp_status" class="w-1/2 border-0 bg-white rounded-xl p-3 text-sm focus:ring-2 focus:ring-[#566858]" required>
                                <option value="">Hadir?</option>
                                <option value="hadir">Ya, Hadir</option>
                                <option value="tidak_hadir">Maaf, Tidak</option>
                            </select>
                        </div>
                        <textarea name="comment" rows="2" class="w-full border-0 bg-white rounded-xl p-3 text-sm focus:ring-2 focus:ring-[#566858]" placeholder="Tulis doa restu..."></textarea>
                        <button class="w-full bg-[#566858] text-white py-3 rounded-xl text-sm font-bold uppercase tracking-widest hover:bg-[#2F4F38] transition shadow-lg">Kirim Ucapan</button>
                    </form>
                    @endif

                    <div class="space-y-4 max-h-60 overflow-y-auto pr-2 custom-scroll">
                        @if(isset($comments) && count($comments) > 0)
                            @foreach($comments as $komentar)
                            <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm ml-2">
                                <div class="flex justify-between mb-1">
                                    <span class="font-bold text-xs text-[#566858]">{{ $komentar->name }}</span>
                                    <span class="text-[10px] text-gray-400">{{ $komentar->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-600">"{{ $komentar->comment }}"</p>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center text-gray-400 text-xs py-4">Belum ada ucapan masuk.</div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-[#2F4F38] text-white py-12 text-center text-xs relative overflow-hidden">
            <div class="relative z-10">
                <p class="mb-4 font-script text-3xl">{{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} & {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}</p>
                <p class="opacity-70">&copy; 2025 Bebungah Invitation</p>
            </div>
        </footer>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });

        function openInvitation() {
            document.getElementById('cover').style.transform = 'translateY(-100%)';
            document.getElementById('content').classList.remove('hidden');
            setTimeout(() => { 
                document.getElementById('content').classList.remove('opacity-0'); 
                playMusic();
            }, 300);
        }

        var audio = document.getElementById("bg-music");
        var isPlaying = false;
        function playMusic() { document.getElementById('music-container').classList.remove('hidden'); audio.play(); isPlaying = true; }
        function toggleMusic() { if(isPlaying){ audio.pause(); document.getElementById('music-icon').classList.remove('spin-slow'); } else { audio.play(); document.getElementById('music-icon').classList.add('spin-slow'); } isPlaying = !isPlaying; }
        function salinRekening() { navigator.clipboard.writeText(document.getElementById('nomorRekening').innerText); alert('Nomor Rekening Tersalin!'); }
        
        const eventDate = new Date("{{ $invitation->event_date->format('Y-m-d H:i:s') }}").getTime();
        setInterval(function() {
            const now = new Date().getTime();
            const d = eventDate - now;
            if(d>0){
                document.getElementById("days").innerText = Math.floor(d / (1000 * 60 * 60 * 24));
                document.getElementById("hours").innerText = Math.floor((d % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.getElementById("minutes").innerText = Math.floor((d % (1000 * 60 * 60)) / (1000 * 60));
                document.getElementById("seconds").innerText = Math.floor((d % (1000 * 60)) / 1000);
            } else {
                 document.getElementById("countdown").innerHTML = "Acara Telah Selesai";
            }
        }, 1000);
    </script>
</body>
</html>