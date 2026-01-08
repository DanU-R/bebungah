<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $invitation->content['mempelai']['pria']['nama'] }} & {{ $invitation->content['mempelai']['wanita']['nama'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Open+Sans:wght@300;400;600&family=Great+Vibes&display=swap" rel="stylesheet">
    
    <style>
        /* Typography */
        .font-header { font-family: 'Playfair Display', serif; }
        .font-script { font-family: 'Great Vibes', cursive; }
        .font-body { font-family: 'Open Sans', sans-serif; }
        
        /* Colors */
        :root {
            --color-gold: #C5A059; /* Gold yang lebih soft mirip referensi */
            --color-dark: #2A2A2A;
            --color-bg: #F9F9F9;
        }
        
        body { background-color: var(--color-bg); color: var(--color-dark); }
        .text-gold { color: var(--color-gold); }
        .bg-gold { background-color: var(--color-gold); }
        .border-gold { border-color: var(--color-gold); }
        
        /* Bingkai Foto Bulat dengan Border Ganda */
        .profile-frame {
            position: relative;
            display: inline-block;
            padding: 8px;
            border: 1px solid var(--color-gold);
            border-radius: 50%;
        }
        .profile-frame img {
            border-radius: 50%;
            width: 160px;
            height: 160px;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Animasi Musik */
        .spin-slow { animation: spin 8s linear infinite; }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        
        /* Scrollbar */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scroll::-webkit-scrollbar-thumb { background: var(--color-gold); border-radius: 4px; }
    </style>
</head>
<body class="antialiased overflow-x-hidden font-body">

    <div id="music-container" class="fixed bottom-6 right-6 z-[100] hidden">
        <audio id="bg-music" loop>
            <source src="{{ isset($invitation->content['media']['music']) ? asset('storage/'.$invitation->content['media']['music']) : 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3' }}" type="audio/mp3">
        </audio>
        <button onclick="toggleMusic()" class="w-12 h-12 bg-white/90 backdrop-blur border border-gold rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-all">
            <svg id="music-icon" class="w-5 h-5 text-gold spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
        </button>
    </div>

    <div id="cover" class="fixed inset-0 z-50 bg-black flex flex-col items-center justify-center text-center text-white px-6 transition-transform duration-1000 bg-cover bg-center" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $invitation->content['media']['cover'] ? asset('storage/'.$invitation->content['media']['cover']) : 'https://images.unsplash.com/photo-1511285560982-1356c11d4606?q=80&w=1000' }}');">
        
        <div class="relative z-10 animate-fade-in-up">
            <h3 class="text-sm md:text-base tracking-[0.3em] uppercase mb-6 font-body text-gray-200">The Wedding of</h3>
            
            <h1 class="text-5xl md:text-7xl font-script text-gold mb-8 drop-shadow-md">
                {{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} 
                <span class="text-white text-3xl mx-2">&</span> 
                {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}
            </h1>

            @if($guest)
                <div class="mb-10 backdrop-blur-sm bg-white/10 p-6 rounded-xl border border-white/20 max-w-xs mx-auto">
                    <p class="text-xs uppercase tracking-widest mb-3 text-gray-200">Kepada Yth. Bapak/Ibu/Saudara/i</p>
                    <h2 class="text-xl font-bold font-header text-white">{{ $guest->name }}</h2>
                    @if($guest->category)
                        <span class="inline-block mt-2 px-3 py-1 bg-gold text-white text-[10px] font-bold uppercase tracking-wider rounded-full">{{ $guest->category }}</span>
                    @endif
                </div>
            @endif

            <button onclick="bukaUndangan()" class="bg-gold text-white font-header px-8 py-3 rounded-full uppercase tracking-widest text-xs font-bold hover:bg-white hover:text-gold transition-all duration-300 shadow-xl flex items-center gap-2 mx-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path></svg>
                Buka Undangan
            </button>
        </div>
    </div>

    <div id="content" class="hidden opacity-0 transition-opacity duration-1000">

        <header class="h-[60vh] flex items-end justify-center bg-cover bg-center relative pb-20" 
                style="background-image: url('{{ $invitation->content['media']['cover'] ? asset('storage/'.$invitation->content['media']['cover']) : 'https://images.unsplash.com/photo-1511285560982-1356c11d4606?q=80&w=1000' }}');">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            <div class="relative z-10 text-center text-white px-4">
                <p class="text-xs md:text-sm tracking-[0.4em] uppercase mb-2 font-body text-gold">We Are Getting Married</p>
                <h1 class="text-4xl md:text-6xl font-script text-white mb-2">
                     {{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} & {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}
                </h1>
                <p class="text-sm md:text-lg font-header italic text-gray-200">{{ $invitation->event_date->format('l, d F Y') }}</p>
            </div>
        </header>

        <section class="py-16 px-6 bg-white text-center">
            <div class="max-w-3xl mx-auto">
                <img src="https://cdn-icons-png.flaticon.com/512/2839/2839176.png" class="w-12 h-12 mx-auto mb-6 opacity-30" alt="Bismillah">
                <h2 class="text-2xl font-script text-gold mb-6">Assalamu'alaikum Wr. Wb.</h2>
                <p class="text-gray-600 text-sm md:text-base leading-loose italic font-header mb-4">
                    "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."
                </p>
                <p class="text-gold font-bold text-xs uppercase tracking-widest">(Q.S. Ar-Rum: 21)</p>
            </div>
        </section>

        <section class="py-20 px-6 bg-[#FDFBF7] text-center">
            <div class="max-w-4xl mx-auto">
                <p class="text-gray-500 mb-12 text-sm">Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan resepsi pernikahan putra-putri kami:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-8 items-start">
                    <div class="flex flex-col items-center group">
                        <div class="profile-frame mb-6 transform group-hover:scale-105 transition duration-500">
                            @if(isset($invitation->content['mempelai']['pria']['foto']))
                                <img src="{{ asset('storage/'.$invitation->content['mempelai']['pria']['foto']) }}" alt="Mempelai Pria">
                            @else
                                <img src="https://via.placeholder.com/300x300?text=Pria" alt="Mempelai Pria">
                            @endif
                        </div>
                        <h3 class="text-3xl font-script text-gold mb-2">{{ $invitation->content['mempelai']['pria']['nama'] }}</h3>
                        <div class="w-10 h-0.5 bg-gold/30 mb-4"></div>
                        <p class="text-sm font-bold text-gray-700">Putra dari:</p>
                        <p class="text-sm text-gray-500">Bpk. {{ $invitation->content['mempelai']['pria']['ayah'] }} <br>& Ibu {{ $invitation->content['mempelai']['pria']['ibu'] }}</p>
                    </div>

                    <div class="flex flex-col items-center group">
                        <div class="profile-frame mb-6 transform group-hover:scale-105 transition duration-500">
                            @if(isset($invitation->content['mempelai']['wanita']['foto']))
                                <img src="{{ asset('storage/'.$invitation->content['mempelai']['wanita']['foto']) }}" alt="Mempelai Wanita">
                            @else
                                <img src="https://via.placeholder.com/300x300?text=Wanita" alt="Mempelai Wanita">
                            @endif
                        </div>
                        <h3 class="text-3xl font-script text-gold mb-2">{{ $invitation->content['mempelai']['wanita']['nama'] }}</h3>
                        <div class="w-10 h-0.5 bg-gold/30 mb-4"></div>
                        <p class="text-sm font-bold text-gray-700">Putri dari:</p>
                        <p class="text-sm text-gray-500">Bpk. {{ $invitation->content['mempelai']['wanita']['ayah'] }} <br>& Ibu {{ $invitation->content['mempelai']['wanita']['ibu'] }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-dark text-white relative bg-fixed bg-cover bg-center" style="background-image: url('{{ $invitation->content['media']['cover'] ? asset('storage/'.$invitation->content['media']['cover']) : '' }}');">
            <div class="absolute inset-0 bg-black/70"></div>
            <div class="relative z-10 container mx-auto px-6 text-center">
                <h2 class="text-2xl font-header mb-8 text-gold uppercase tracking-[0.2em]">Menuju Hari Bahagia</h2>
                
                <div id="countdown" class="grid grid-cols-4 gap-2 md:gap-6 max-w-lg mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-lg">
                        <span id="days" class="text-2xl md:text-4xl font-bold">00</span>
                        <div class="text-[10px] uppercase tracking-widest mt-1">Hari</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-lg">
                        <span id="hours" class="text-2xl md:text-4xl font-bold">00</span>
                        <div class="text-[10px] uppercase tracking-widest mt-1">Jam</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-lg">
                        <span id="minutes" class="text-2xl md:text-4xl font-bold">00</span>
                        <div class="text-[10px] uppercase tracking-widest mt-1">Menit</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-4 rounded-lg">
                        <span id="seconds" class="text-2xl md:text-4xl font-bold">00</span>
                        <div class="text-[10px] uppercase tracking-widest mt-1">Detik</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 px-6 bg-white text-center">
            <div class="max-w-2xl mx-auto border border-gold/50 p-8 md:p-12 relative">
                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-gold"></div>
                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-gold"></div>
                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-gold"></div>
                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-gold"></div>

                <h2 class="text-3xl font-header text-gold mb-8">Save The Date</h2>
                
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 uppercase tracking-widest mb-2">Resepsi Pernikahan</h3>
                    <p class="text-gold font-script text-3xl mb-2">{{ $invitation->event_date->format('l') }}</p>
                    <p class="text-gray-700 font-bold text-lg mb-1">{{ $invitation->event_date->format('d F Y') }}</p>
                    <p class="text-gray-500 text-sm">Pukul 09.00 WIB s/d Selesai</p>
                </div>

                <div class="w-full h-px bg-gray-200 my-8"></div>

                <div class="mb-8">
                    <p class="text-xs font-bold uppercase text-gray-400 mb-2">Bertempat di:</p>
                    <p class="text-gray-700 font-header text-lg leading-relaxed">{{ $invitation->content['acara']['alamat'] }}</p>
                </div>

                <a href="{{ $invitation->content['acara']['maps_link'] }}" target="_blank" class="inline-flex items-center gap-2 bg-dark text-white px-6 py-3 rounded text-xs font-bold uppercase tracking-widest hover:bg-gold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Google Maps
                </a>
            </div>
        </section>

        @if(isset($invitation->content['media']['video_link']) && $invitation->content['media']['video_link'])
        <section class="py-16 bg-[#F9F9F9] text-center">
            <div class="max-w-4xl mx-auto px-6">
                <h2 class="text-2xl font-header mb-8 text-gold uppercase tracking-widest">Live Streaming</h2>
                <div class="relative w-full pb-[56.25%] rounded-xl overflow-hidden shadow-2xl bg-black">
                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $invitation->content['media']['video_link'] }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        @endif

        @if(isset($invitation->content['amplop']['bank_name']) && $invitation->content['amplop']['bank_name'])
        <section class="py-20 px-6 bg-white text-center">
            <div class="max-w-lg mx-auto">
                <h2 class="text-3xl font-header text-dark mb-4">Wedding Gift</h2>
                <p class="text-gray-500 text-sm mb-10 italic">Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Dan jika memberi adalah ungkapan tanda kasih Anda, Anda dapat memberi kado secara cashless.</p>
                
                <div class="bg-[#FDFBF7] border border-gold/30 p-8 rounded-xl shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-20 h-20 bg-gold/10 transform rotate-45"></div>

                    <div class="font-bold text-xl text-gray-800 mb-1">{{ $invitation->content['amplop']['bank_name'] }}</div>
                    <div class="text-2xl font-mono text-gold font-bold mb-2" id="nomorRekening">{{ $invitation->content['amplop']['account_number'] }}</div>
                    <div class="text-sm text-gray-500 mb-6">a.n {{ $invitation->content['amplop']['account_holder'] }}</div>
                    
                    <button onclick="salinRekening()" class="w-full border border-dark text-dark py-3 rounded text-xs font-bold uppercase hover:bg-dark hover:text-white transition">
                        Salin Rekening
                    </button>
                </div>
            </div>
        </section>
        @endif

        <section class="py-20 px-6 bg-[#F5F5F5]">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-header text-center text-dark mb-10">Ucapan & Doa</h2>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10 max-h-[400px] overflow-y-auto custom-scroll">
                    @if(isset($comments) && count($comments) > 0)
                        @foreach($comments as $komentar)
                        <div class="mb-6 border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold text-xs">
                                    {{ substr($komentar->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-800">{{ $komentar->name }}</h4>
                                    <span class="text-[10px] text-gray-400">{{ $komentar->created_at->diffForHumans() }}</span>
                                </div>
                                @if($komentar->rsvp_status == 'hadir')
                                    <span class="ml-auto text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-bold">Hadir</span>
                                @else
                                    <span class="ml-auto text-[10px] bg-red-100 text-red-700 px-2 py-0.5 rounded-full font-bold">Maaf</span>
                                @endif
                            </div>
                            <p class="text-gray-600 text-sm pl-11">"{{ $komentar->comment }}"</p>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-8 text-gray-400 text-sm">Belum ada ucapan. Jadilah yang pertama!</div>
                    @endif
                </div>

                @if($guest)
                    <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-gold">
                        <h3 class="text-lg font-bold text-center mb-6 uppercase tracking-widest text-gold">Konfirmasi Kehadiran</h3>
                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-3 text-sm rounded mb-4 text-center">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('invitation.rsvp', $guest->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Tamu</label>
                                <input type="text" value="{{ $guest->name }}" class="w-full bg-gray-50 border border-gray-200 rounded p-3 text-sm focus:outline-none" readonly>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kehadiran</label>
                                <select name="rsvp_status" class="w-full border border-gray-200 rounded p-3 text-sm focus:border-gold outline-none" required>
                                    <option value="">- Pilih Status -</option>
                                    <option value="hadir">Hadir</option>
                                    <option value="tidak_hadir">Mohon Maaf, Berhalangan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kirim Ucapan</label>
                                <textarea name="comment" rows="3" class="w-full border border-gray-200 rounded p-3 text-sm focus:border-gold outline-none" placeholder="Tulis doa restu Anda disini..."></textarea>
                            </div>
                            <button class="w-full bg-gold text-white font-bold py-3 rounded shadow hover:bg-dark transition-all uppercase tracking-widest text-xs">Kirim Konfirmasi</button>
                        </form>
                    </div>
                @endif
            </div>
        </section>

        <footer class="bg-dark text-white py-10 text-center">
            <h2 class="font-script text-3xl text-gold mb-4">
                {{ explode(' ', $invitation->content['mempelai']['pria']['nama'])[0] }} & {{ explode(' ', $invitation->content['mempelai']['wanita']['nama'])[0] }}
            </h2>
            <p class="text-xs text-gray-500 uppercase tracking-widest mb-8">Terima kasih atas doa & restu Anda</p>
            <div class="text-[10px] text-gray-600 border-t border-gray-800 pt-6">
                &copy; 2025 Bebungah Digital Invitation
            </div>
        </footer>

    </div>

    <script>
        // BUKA UNDANGAN
        function bukaUndangan() {
            document.getElementById('cover').style.transform = 'translateY(-100%)';
            document.getElementById('content').classList.remove('hidden');
            setTimeout(() => { 
                document.getElementById('content').classList.remove('opacity-0'); 
                playMusic();
            }, 300);
        }

        // MUSIK PLAYER
        var audio = document.getElementById("bg-music");
        var icon = document.getElementById("music-icon");
        var isPlaying = false;

        function playMusic() {
            document.getElementById('music-container').classList.remove('hidden');
            audio.play().catch(function(error) {
                console.log("Autoplay blocked, waiting for user interaction.");
            });
            isPlaying = true;
        }

        function toggleMusic() {
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('spin-slow');
            } else {
                audio.play();
                icon.classList.add('spin-slow');
            }
            isPlaying = !isPlaying;
        }

        // SALIN REKENING
        function salinRekening() {
            var text = document.getElementById('nomorRekening').innerText;
            navigator.clipboard.writeText(text).then(function() {
                alert('Nomor Rekening Berhasil Disalin!');
            });
        }

        // COUNTDOWN TIMER
        const eventDate = new Date("{{ $invitation->event_date->format('Y-m-d H:i:s') }}").getTime();
        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = eventDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = days < 10 ? "0" + days : days;
            document.getElementById("hours").innerText = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").innerText = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById("seconds").innerText = seconds < 10 ? "0" + seconds : seconds;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "<div class='col-span-4 text-center text-white font-bold bg-gold/80 p-3 rounded'>Acara Telah Selesai</div>";
            }
        }, 1000);
    </script>
</body>
</html>