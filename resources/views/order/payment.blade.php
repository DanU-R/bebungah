<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran - Bebungah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl overflow-hidden flex flex-col md:flex-row min-h-[500px]">
        
        <div class="w-full md:w-1/2 bg-gray-900 text-white p-8 md:p-12 flex flex-col items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#6366f1 1px, transparent 1px); background-size: 20px 20px;"></div>
            
            <div class="relative z-10 text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-2">Scan untuk Membayar</h2>
                <p class="text-gray-400 text-sm mb-8">Otomatis dicek manual oleh Admin</p>

                <div class="bg-white p-4 rounded-2xl shadow-lg inline-block transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('img/qris1.jpeg') }}" 
                         alt="QRIS Code" 
                         class="w-64 h-64 md:w-80 md:h-80 object-contain mx-auto mix-blend-multiply">
                </div>

                <div class="mt-8 flex justify-center gap-4 opacity-70 grayscale hover:grayscale-0 transition-all">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/1200px-QRIS_logo.svg.png" class="h-6 bg-white rounded px-1">
                    <span class="text-xs text-gray-400 self-center">+ Semua E-Wallet</span>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-500 md:hidden"></div>

            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Pesanan Dibuat!</h1>
                    <p class="text-gray-500 text-xs">Menunggu pembayaran.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-xl p-5 mb-6 bg-gray-50/50">
                <div class="flex justify-between items-center mb-3 text-sm">
                    <span class="text-gray-500">ID Pesanan</span>
                    <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded">#INV-{{ rand(1000,9999) }}</span>
                </div>
                <div class="flex justify-between items-center mb-3 text-sm">
                    <span class="text-gray-500">Paket</span>
                    <span class="font-semibold text-gray-800">Undangan Premium</span>
                </div>
                <div class="w-full h-px bg-gray-200 my-3"></div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-bold">Total Pembayaran</span>
                    <span class="text-2xl font-extrabold text-gray-900">Rp 99.000</span>
                </div>
            </div>

            <div class="bg-blue-50 text-blue-700 px-4 py-3 rounded-lg text-xs mb-8 flex gap-2 leading-relaxed">
                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p>Mohon transfer sesuai nominal. Setelah itu, <b>wajib kirim bukti transfer</b> ke WhatsApp Admin agar akun segera aktif.</p>
            </div>

            @php
                $email = session('order_email') ?? '-';
                $adminWa = '6282220312195'; 
                $pesan = "Halo Admin Bebungah,%0A%0ASaya sudah order undangan dan melakukan pembayaran.%0AEmail Login: $email%0ATotal: Rp 99.000%0A%0AMohon segera diproses dan kirimkan password akun saya. Terima kasih!";
            @endphp

            <a href="https://wa.me/{{ $adminWa }}?text={{ $pesan }}" target="_blank" class="group w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-xl text-center shadow-lg shadow-green-200 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-3">
                <svg class="w-6 h-6 animate-pulse" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                <span>Konfirmasi Pembayaran</span>
            </a>
            
            <a href="/" class="mt-4 text-center text-xs text-gray-400 hover:text-indigo-600 transition">Batalkan & Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>