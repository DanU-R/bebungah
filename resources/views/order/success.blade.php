<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Diterima!</h1>
        <p class="text-gray-600 mb-6">
            Data undangan <strong>{{ $invitation->slug }}</strong> berhasil disimpan. Anda akan dialihkan ke WhatsApp Admin untuk konfirmasi.
        </p>

        <div class="animate-pulse text-sm text-gray-400 mb-6">
            Mengalihkan dalam 3 detik...
        </div>

        <a href="{{ $waLink }}" class="block w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-xl transition-colors">
            Chat Admin Sekarang (Manual)
        </a>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ $waLink }}"; // Blade akan merender link WA yang aman
        }, 3000); // Redirect setelah 3 detik
    </script>

</body>
</html>