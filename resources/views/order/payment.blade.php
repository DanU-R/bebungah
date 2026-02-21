<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran - TEMANTEN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 48 48%22><rect width=%2248%22 height=%2248%22 rx=%2212%22 fill=%22%234F46E5%22/><path d=%22M15 13h18v6h-6v17h-6v-17h-6v-6z%22 fill=%22white%22/></svg>">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* =================================================================
           CONFIGURATION SECTION - EDIT VALUES HERE
           ================================================================= */
        :root {
            /* Brand Colors */
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --secondary: #EC4899;
            --accent: #10B981;
            
            /* Status Colors */
            --success: #10B981;
            --warning: #F59E0B;
            --info: #3B82F6;
            --error: #EF4444;
        }
        
        /* =================================================================
           CUSTOM STYLES - SAFE TO MODIFY
           ================================================================= */
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.4); }
            50% { box-shadow: 0 0 30px rgba(16, 185, 129, 0.6); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        
        .animate-fadeIn { animation: fadeIn 0.8s ease-out; }
        .animate-slideUp { animation: slideUp 0.6s ease-out; }
        .animate-scaleIn { animation: scaleIn 0.5s ease-out; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .pulse-glow { animation: pulse-glow 2s infinite; }
        
        /* Gradient backgrounds */
        .gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-success {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        }
        
        /* Dot pattern background */
        .dot-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        /* QR Code hover effect */
        .qr-container {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .qr-container:hover {
            transform: scale(1.05) rotate(2deg);
        }
        
        /* Success checkmark animation */
        @keyframes checkmark {
            0% { stroke-dashoffset: 100; }
            100% { stroke-dashoffset: 0; }
        }
        
        .checkmark-path {
            stroke-dasharray: 100;
            animation: checkmark 0.6s ease-out 0.3s forwards;
        }
        
        /* Button shine effect */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-shine:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-indigo-50/30 min-h-screen flex items-center justify-center p-4 md:p-8">

    <!-- Main Container -->
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-6xl overflow-hidden animate-fadeIn">
        
        <!-- Success Header Bar (Mobile) -->
        <div class="md:hidden w-full h-2 bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500"></div>
        
        <div class="flex flex-col md:flex-row min-h-[600px]">
            
            <!-- Left Panel - QR Code Section -->
            <div class="w-full md:w-1/2 gradient-primary text-white p-8 md:p-12 flex flex-col items-center justify-center relative overflow-hidden">
                <!-- Decorative Background Pattern -->
                <div class="absolute inset-0 dot-pattern opacity-100"></div>
                
                <!-- Floating Decoration Elements -->
                <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full blur-2xl animate-float"></div>
                <div class="absolute bottom-10 right-10 w-32 h-32 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
                
                <!-- Content -->
                <div class="relative z-10 text-center space-y-8 animate-slideUp">
                    <!-- Header -->
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold mb-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span>Pembayaran Mudah & Aman</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">Scan untuk<br/>Membayar</h2>
                        <p class="text-white/80 text-sm">Pembayaran akan diverifikasi otomatis oleh sistem kami</p>
                    </div>

                    <!-- QR Code -->
                    <div class="qr-container inline-block">
                        <div class="bg-white p-6 rounded-3xl shadow-2xl">
                            <!-- 
                                ============================================
                                QRIS IMAGE - EDIT PATH HERE
                                ============================================
                            -->
                            <img src="{{ asset('img/qris1.jpeg') }}" 
                                 alt="QRIS Payment Code" 
                                 class="w-64 h-64 md:w-80 md:h-80 object-contain mx-auto rounded-xl">
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-center gap-4 flex-wrap">
                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl flex items-center gap-2">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/1200px-QRIS_logo.svg.png" 
                                     class="h-5 brightness-0 invert" 
                                     alt="QRIS">
                                <span class="text-xs font-semibold">QRIS</span>
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl">
                                <span class="text-xs font-semibold">+ Semua E-Wallet</span>
                            </div>
                        </div>
                        
                        <!-- Supported E-Wallets -->
                        <div class="flex items-center justify-center gap-3 opacity-80">
                            <span class="text-xs">Mendukung:</span>
                            <div class="flex gap-2">
                                <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                    <span class="text-xs font-bold">OVO</span>
                                </div>
                                <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                    <span class="text-xs font-bold">GP</span>
                                </div>
                                <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                    <span class="text-xs font-bold">DA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Order Details & Confirmation -->
            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white relative">
                
                <!-- Success Badge -->
                <div class="flex items-center gap-4 mb-8 animate-slideUp">
                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-green-200">
                            <svg class="w-8 h-8 text-white checkmark-path" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full animate-ping"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold text-gray-900">Pesanan Berhasil Dibuat!</h1>
                        <p class="text-gray-500 text-sm mt-1">Menunggu konfirmasi pembayaran Anda</p>
                    </div>
                </div>

                <!-- Order Summary Card -->
                <div class="border-2 border-gray-100 rounded-2xl p-6 mb-6 bg-gradient-to-br from-gray-50 to-white shadow-lg animate-scaleIn space-y-4">
                    <h3 class="font-bold text-gray-900 text-lg mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Ringkasan Pesanan
                    </h3>
                    
                    <!-- Order Details -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">ID Pesanan</span>
                            <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg">#INV-{{ rand(1000,9999) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">Paket</span>
                            <span class="font-semibold text-gray-900">Undangan Premium</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">Status</span>
                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 px-3 py-1 rounded-lg text-xs font-bold">
                                <div class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></div>
                                Menunggu Pembayaran
                            </span>
                        </div>
                    </div>
                    
                    <!-- Divider -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent my-4"></div>
                    
                    <!-- Total -->
                    <div class="flex justify-between items-center bg-indigo-50 rounded-xl p-4">
                        <span class="text-gray-700 font-bold text-base">Total Pembayaran</span>
                        <span class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Rp 99.000</span>
                    </div>
                </div>

                <!-- Important Notice -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-5 mb-8 animate-slideUp">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <div class="flex-1 space-y-2">
                            <h4 class="font-bold text-blue-900 text-sm">Langkah Selanjutnya:</h4>
                            <ol class="text-blue-800 text-sm space-y-1.5 leading-relaxed list-decimal list-inside">
                                <li>Transfer sesuai <strong>nominal exact</strong> (Rp 99.000)</li>
                                <li><strong>Wajib kirim bukti transfer</strong> ke WhatsApp Admin</li>
                                <li>Akun Anda akan <strong>aktif otomatis</strong> setelah verifikasi</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- 
                    ============================================
                    WHATSAPP CONFIGURATION - EDIT VALUES HERE
                    ============================================
                -->
                @php
                    $email = session('order_email') ?? '-';
                    
                    // WhatsApp Admin Number (without +)
                    $adminWa = '6282220312195'; 
                    
                    // WhatsApp Message Template
                    $pesan = "Halo Admin Bebungah,%0A%0ASaya sudah order undangan dan melakukan pembayaran.%0AEmail Login: $email%0ATotal: Rp 99.000%0A%0AMohon segera diproses dan kirimkan password akun saya. Terima kasih!";
                @endphp

                <!-- WhatsApp Confirmation Button -->
                <a href="https://wa.me/{{ $adminWa }}?text={{ $pesan }}" 
                   target="_blank" 
                   class="group btn-shine w-full gradient-success text-white font-bold py-5 rounded-2xl text-center shadow-2xl shadow-green-300 transition-all transform hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-3 mb-4 pulse-glow">
                    <svg class="w-7 h-7 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span class="text-lg">Konfirmasi Pembayaran via WhatsApp</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                
                <!-- 
                    ============================================
                    CANCEL/BACK LINK - EDIT URL HERE
                    ============================================
                -->
                <a href="/" 
                   class="group text-center text-sm text-gray-500 hover:text-indigo-600 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span>Batalkan & Kembali ke Beranda</span>
                </a>

                <!-- Features Info -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs text-gray-500 text-center mb-3 font-semibold">Yang Anda Dapatkan:</p>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="text-center space-y-1">
                            <div class="w-8 h-8 bg-indigo-50 rounded-lg flex items-center justify-center mx-auto">
                                <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Unlimited Tamu</p>
                        </div>
                        <div class="text-center space-y-1">
                            <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center mx-auto">
                                <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Edit Kapan Saja</p>
                        </div>
                        <div class="text-center space-y-1">
                            <div class="w-8 h-8 bg-pink-50 rounded-lg flex items-center justify-center mx-auto">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Akses Selamanya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Info (Optional) -->
    <div class="fixed bottom-4 left-1/2 transform -translate-x-1/2 hidden md:block">
        <div class="bg-white/90 backdrop-blur-sm px-6 py-2 rounded-full shadow-lg border border-gray-200 flex items-center gap-2 text-xs text-gray-600">
            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="font-medium">Pembayaran Aman & Terenkripsi</span>
        </div>
    </div>

</body>
</html>