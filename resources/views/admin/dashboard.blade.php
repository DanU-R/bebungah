<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Separated</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-6 md:p-10">

    <div class="max-w-7xl mx-auto mb-10 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Admin Panel</h1>
            <p class="text-gray-500">Kelola pesanan dan akun klien dalam satu tempat.</p>
        </div>
        <div class="text-right">
            <span class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold shadow">
                Admin Mode
            </span>
        </div>
    </div>

    @if(session('success'))
    <div class="max-w-7xl mx-auto mb-6">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 shadow-sm" role="alert">
            <p class="font-bold">Sukses</p>
            <p>{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <div class="max-w-7xl mx-auto mb-12">
        <div class="flex items-center gap-3 mb-4">
            <div class="bg-yellow-100 text-yellow-800 p-2 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Permintaan Masuk <span class="text-sm font-normal text-gray-500">({{ $pendingOrders->count() }} Pending)</span></h2>
        </div>

        <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-100">
            @if($pendingOrders->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID / Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Mempelai</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kontak WA</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pendingOrders as $order)
                    <tr class="hover:bg-yellow-50/30 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="font-mono text-sm font-bold text-yellow-700 bg-yellow-100 px-2 py-1 rounded">#INV-{{ $order->id }}</span>
                            <div class="text-xs text-gray-500 mt-1">{{ $order->created_at->format('d M Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">
                                {{ $order->content['mempelai']['pria']['nama'] }} & {{ $order->content['mempelai']['wanita']['nama'] }}
                            </div>
                            <div class="text-xs text-gray-500">Acara: {{ $order->event_date->format('d M Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ $order->theme->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="https://wa.me/{{ $order->client_whatsapp }}" target="_blank" class="text-green-600 font-bold hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                {{ $order->client_whatsapp }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <form action="{{ route('admin.approve', $order->id) }}" method="POST" onsubmit="return confirm('ACC & Buat Akun?');">
                                @csrf
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                                    ✓ ACC & Buat Akun
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="p-10 text-center text-gray-500">
                <p>Belum ada permintaan undangan baru.</p>
            </div>
            @endif
        </div>
    </div>


    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-3 mb-4">
            <div class="bg-green-100 text-green-800 p-2 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Klien Aktif <span class="text-sm font-normal text-gray-500">({{ $activeOrders->count() }} Akun)</span></h2>
        </div>

        <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-100">
            @if($activeOrders->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Info Akun</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Detail Klien</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Manajemen</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($activeOrders as $client)
                    <tr class="hover:bg-green-50/30 transition-colors">
                        <td class="px-6 py-4">
                            @if($client->user)
                                <div class="text-sm font-bold text-gray-800">{{ $client->user->email }}</div>
                                <div class="text-xs text-gray-400">Login Email</div>
                            @else
                                <span class="text-red-500 text-xs">Error: User terhapus</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $client->content['mempelai']['pria']['nama'] }} & {{ $client->content['mempelai']['wanita']['nama'] }}
                            </div>
                            <div class="text-xs text-gray-500">
                                <a href="{{ url('undangan/'.$client->slug) }}" target="_blank" class="text-indigo-600 hover:underline">
                                    Lihat Undangan &nearr;
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                                AKTIF
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            @if($client->user)
                            <form action="{{ route('admin.resetPassword', $client->user->id) }}" method="POST" onsubmit="return confirm('Yakin reset password klien ini?');">
                                @csrf
                                <button type="submit" class="border border-red-200 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold py-2 px-4 rounded-lg transition-all text-sm">
                                    🔑 Reset Password
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="p-10 text-center text-gray-500">
                <p>Belum ada klien aktif.</p>
            </div>
            @endif
        </div>
    </div>


    @if(session('new_account'))
    <div class="fixed inset-0 bg-gray-900 bg-opacity-70 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-lg w-full transform transition-all scale-100">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Akun Klien Berhasil Dibuat!</h2>
                <p class="text-gray-500 text-sm">Salin data di bawah ini.</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6 font-mono text-sm">
                <div class="mb-2"><span class="font-bold text-gray-500">Email:</span> <span class="select-all bg-white px-2 py-1 rounded border">{{ session('new_account')['email'] }}</span></div>
                <div><span class="font-bold text-gray-500">Pass :</span> <span class="select-all bg-white px-2 py-1 rounded border text-red-600 font-bold">{{ session('new_account')['password'] }}</span></div>
            </div>

            <div class="mb-4">
                <label class="text-xs text-gray-500 font-bold mb-1 block">Copy Pesan WA:</label>
                <textarea class="w-full text-sm p-3 border rounded h-24 bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:outline-none" readonly>Halo Kak, undangan sudah aktif! 🎉

Login Dashboard:
🔗 http://127.0.0.1:8000/login
📧 {{ session('new_account')['email'] }}
🔑 {{ session('new_account')['password'] }}

Terima kasih!</textarea>
            </div>

            <button onclick="this.closest('.fixed').remove()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg w-full">Tutup</button>
        </div>
    </div>
    @endif

    @if(session('reset_success'))
    <div class="fixed inset-0 bg-gray-900 bg-opacity-70 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-lg w-full">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Password Baru Direset!</h2>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6 font-mono text-sm">
                <div class="mb-2"><span class="font-bold text-gray-500">Email:</span> <span class="select-all">{{ session('reset_success')['email'] }}</span></div>
                <div><span class="font-bold text-gray-500">Pass Baru:</span> <span class="select-all text-red-600 font-bold text-lg bg-white px-2 rounded border">{{ session('reset_success')['password'] }}</span></div>
            </div>

            <div class="mb-4">
                <textarea class="w-full text-sm p-3 border rounded h-20 bg-gray-50" readonly>Halo Kak, ini password barunya ya:
🔑 {{ session('reset_success')['password'] }}

Silakan login ulang.</textarea>
            </div>

            <button onclick="this.closest('.fixed').remove()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg w-full">Tutup</button>
        </div>
    </div>
    @endif

</body>
</html>