<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebungah - Platform Undangan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Animasi Blob Background */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <div id="previewModal" class="fixed inset-0 z-[100] hidden bg-black/90 backdrop-blur-sm transition-opacity duration-300 opacity-0">
        <button onclick="closePreview()" class="absolute top-4 right-4 text-white hover:text-red-400 z-[110] bg-black/50 rounded-full p-2 transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <div class="absolute inset-0 flex items-center justify-center -z-10">
            <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-white"></div>
        </div>

        <div class="w-full h-full flex items-center justify-center p-0 md:p-10">
            <div class="relative w-full h-full md:w-[375px] md:h-[812px] bg-white rounded-[0px] md:rounded-[3rem] overflow-hidden shadow-2xl border-0 md:border-[8px] border-gray-800">
                <iframe id="previewFrame" src="" class="w-full h-full" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center gap-2 group">
                <span class="bg-indigo-600 text-white w-10 h-10 flex items-center justify-center rounded-xl font-bold text-xl group-hover:rotate-12 transition">B</span>
                <span class="font-bold text-xl text-gray-800">Bebungah</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                <a href="#fitur" class="hover:text-indigo-600 transition">Fitur</a>
                <a href="#tema" class="hover:text-indigo-600 transition">Katalog Tema</a>
                <a href="#harga" class="hover:text-indigo-600 transition">Harga</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('client.dashboard') }}" class="text-sm font-bold text-gray-700 hover:text-indigo-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-indigo-600 hidden md:block">Masuk</a>
                @endauth
                <a href="{{ route('order.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:scale-105 transition-all">
                    Buat Undangan
                </a>
            </div>
        </div>
    </nav>

    <section class="pt-32 pb-20 px-6 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
            <div class="absolute top-0 left-1/4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/3 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left z-10">
                <div class="inline-block bg-white border border-indigo-100 text-indigo-600 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-6 shadow-sm">
                    ✨ Undangan Digital Premium #1
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    Bagikan Momen <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Bahagiamu.</span>
                </h1>
                <p class="text-lg text-gray-500 mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                    Buat undangan pernikahan digital yang elegan dalam hitungan menit. Fitur lengkap, desain premium, dan harga terjangkau.
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                    <a href="#tema" class="bg-indigo-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-indigo-200 hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                        Pilih Tema
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </a>
                </div>
            </div>
            <div class="relative z-10 flex justify-center">
                <div class="relative mx-auto border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-2xl rotate-3 hover:rotate-0 transition duration-500">
                    <div class="h-[32px] w-[3px] bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg"></div>
                    <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
                    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white">
                        <iframe src="{{ url('/undangan/danu-ranggana') }}" class="w-full h-full" scrolling="yes"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tema" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pilihan Tema Eksklusif</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Pilih desain yang paling mewakili karakter kalian berdua.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="group bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0202128?q=80&w=600" alt="Rustic Gold" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <button onclick="openPreview('{{ url('/undangan/danu-ranggana') }}')" class="bg-white text-gray-900 px-6 py-2 rounded-full font-bold text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Live Preview
                            </button>
                        </div>
                        <div class="absolute top-4 right-4 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded">PREMIUM</div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Rustic Gold</h3>
                        <p class="text-gray-500 text-sm mb-6">Tema elegan dengan nuansa emas dan tekstur kertas klasik. Cocok untuk pernikahan mewah.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">Rp 99.000</span>
                            <a href="{{ route('order.create') }}?theme=rustic-gold" class="text-sm font-bold text-gray-900 hover:text-indigo-600 flex items-center gap-1">
                                Pilih Tema <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-2xl hover:border-pink-200 transition-all duration-300">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1522673607200-1645062cd495?q=80&w=600" alt="Floral Pink" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <button onclick="openPreview('{{ url('/undangan/danu-ranggana') }}')" class="bg-white text-gray-900 px-6 py-2 rounded-full font-bold text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Live Preview
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Floral Pink</h3>
                        <p class="text-gray-500 text-sm mb-6">Nuansa bunga yang lembut dan romantis. Cocok untuk acara outdoor atau garden party.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">Rp 99.000</span>
                            <a href="{{ route('order.create') }}?theme=floral-pink" class="text-sm font-bold text-gray-900 hover:text-indigo-600 flex items-center gap-1">
                                Pilih Tema <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-2xl hover:border-blue-200 transition-all duration-300">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=600" alt="Ocean Blue" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <button onclick="openPreview('{{ url('/undangan/danu-ranggana') }}')" class="bg-white text-gray-900 px-6 py-2 rounded-full font-bold text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Live Preview
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Ocean Blue</h3>
                        <p class="text-gray-500 text-sm mb-6">Desain minimalis dengan warna biru laut yang menenangkan. Simpel dan modern.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">Rp 99.000</span>
                            <a href="{{ route('order.create') }}?theme=ocean-blue" class="text-sm font-bold text-gray-900 hover:text-indigo-600 flex items-center gap-1">
                                Pilih Tema <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="fitur" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <div class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6">⚡</div>
                    <h3 class="font-bold text-lg mb-2">Proses Cepat</h3>
                    <p class="text-gray-500 text-sm">Undangan langsung aktif setelah pembayaran. Edit data kapan saja.</p>
                </div>
                <div class="p-6">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6">📱</div>
                    <h3 class="font-bold text-lg mb-2">Mobile Friendly</h3>
                    <p class="text-gray-500 text-sm">Tampilan responsif di semua perangkat. Ringan dan cepat diakses.</p>
                </div>
                <div class="p-6">
                    <div class="w-16 h-16 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6">💌</div>
                    <h3 class="font-bold text-lg mb-2">Unlimited Tamu</h3>
                    <p class="text-gray-500 text-sm">Sebar undangan ke sebanyak mungkin teman dan kerabat tanpa batasan.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="font-bold text-2xl text-gray-900 mb-4">Bebungah</h2>
            <p class="text-gray-500 text-sm mb-8">Platform pembuatan undangan pernikahan digital #1 di Indonesia.</p>
            <p class="text-gray-400 text-xs">&copy; 2025 Bebungah Digital Invitation. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const modal = document.getElementById('previewModal');
        const frame = document.getElementById('previewFrame');

        function openPreview(url) {
            // Set URL ke iframe
            frame.src = url;
            // Tampilkan Modal
            modal.classList.remove('hidden');
            // Sedikit delay untuk animasi fade-in
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
        }

        function closePreview() {
            // Animasi fade-out
            modal.classList.add('opacity-0');
            
            // Tunggu animasi selesai baru hide dan reset iframe
            setTimeout(() => {
                modal.classList.add('hidden');
                frame.src = ''; // Stop musik/video dengan mengosongkan source
            }, 300);
        }

        // Close modal kalau klik di area gelap (luar frame)
        modal.addEventListener('click', function(e) {
            if (e.target === modal || e.target.parentElement === modal) {
                closePreview();
            }
        });
    </script>
</body>
</html>