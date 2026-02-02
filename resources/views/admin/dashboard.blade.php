<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                    Admin Panel <span class="text-indigo-600 dark:text-indigo-400">.</span>
                </h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                    Kelola pesanan dan akun klien dalam satu tempat.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 p-2 rounded-lg shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Permintaan Masuk 
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-2 bg-white dark:bg-gray-700 px-2 py-0.5 rounded-full border dark:border-gray-600">
                            ({{ $pendingOrders->count() }} Pending)
                        </span>
                    </h2>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-xl shadow-yellow-100/50 dark:shadow-none rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 transition-colors">
                    @if($pendingOrders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-yellow-50 dark:bg-yellow-900/20">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID / Tanggal</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Mempelai</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Paket</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kontak WA</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($pendingOrders as $order)
                                <tr class="hover:bg-yellow-50/30 dark:hover:bg-yellow-900/10 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-mono text-xs font-bold text-yellow-700 dark:text-yellow-300 bg-yellow-100 dark:bg-yellow-900/40 px-2 py-1 rounded">#INV-{{ $order->id }}</span>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 font-medium">{{ $order->created_at->format('d M Y, H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900 dark:text-white">
                                            {{ $order->content['mempelai']['pria']['nama'] }} & {{ $order->content['mempelai']['wanita']['nama'] }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            Acara: {{ $order->event_date->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-600">
                                            {{ $order->theme->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="https://wa.me/{{ $order->client_whatsapp }}" target="_blank" class="text-green-600 dark:text-green-400 font-bold hover:text-green-800 dark:hover:text-green-300 transition flex items-center gap-1 bg-green-50 dark:bg-green-900/20 w-fit px-3 py-1 rounded-full border border-green-100 dark:border-green-800">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                            {{ $order->client_whatsapp }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <form action="{{ route('admin.approve', $order->id) }}" method="POST" onsubmit="konfirmasiSwalACC(event, '{{ $order->content['mempelai']['pria']['nama'] }} & {{ $order->content['mempelai']['wanita']['nama'] }}')">
                                            @csrf
                                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-5 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 text-xs uppercase tracking-wide flex items-center gap-2 ml-auto">
                                                <span>Aktifkan</span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="p-12 text-center text-gray-400 dark:text-gray-500 flex flex-col items-center">
                        <svg class="w-16 h-16 mb-4 text-gray-200 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        <p>Belum ada pesanan baru masuk.</p>
                    </div>
                    @endif
                </div>
            </div>

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 p-2 rounded-lg shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Klien Aktif 
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 ml-2 bg-white dark:bg-gray-700 px-2 py-0.5 rounded-full border dark:border-gray-600">
                            ({{ $activeOrders->count() }} Akun)
                        </span>
                    </h2>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-xl shadow-green-100/50 dark:shadow-none rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 transition-colors">
                    @if($activeOrders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-green-50 dark:bg-green-900/20">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Info Login</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Detail Klien</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Manajemen</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($activeOrders as $client)
                                <tr class="hover:bg-green-50/30 dark:hover:bg-green-900/10 transition-colors">
                                    <td class="px-6 py-4">
                                        @if($client->user)
                                            <div class="text-sm font-mono font-bold text-gray-800 dark:text-white bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded w-fit select-all">{{ $client->user->email }}</div>
                                            <div class="text-[10px] text-gray-400 mt-1 uppercase tracking-wide font-bold">Username</div>
                                        @else
                                            <span class="text-red-500 dark:text-red-400 text-xs font-bold bg-red-100 dark:bg-red-900/20 px-2 py-1 rounded">Error: User Missing</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900 dark:text-white">
                                            {{ $client->content['mempelai']['pria']['nama'] }} & {{ $client->content['mempelai']['wanita']['nama'] }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            <a href="{{ url('undangan/'.$client->slug) }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                                Lihat Undangan
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 text-xs font-extrabold px-3 py-1 rounded-full border border-green-200 dark:border-green-800 shadow-sm flex items-center gap-1 w-fit">
                                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> AKTIF
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        @if($client->user)
                                        <form action="{{ route('admin.resetPassword', $client->user->id) }}" method="POST" onsubmit="konfirmasiSwalReset(event, '{{ $client->user->email }}')">
                                            @csrf
                                            <button type="submit" class="border border-red-200 dark:border-red-800 bg-white dark:bg-gray-700 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 hover:text-red-700 dark:hover:text-red-300 font-bold py-1.5 px-4 rounded-lg transition-all text-xs flex items-center gap-1 ml-auto shadow-sm">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                                                Reset Pass
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="p-12 text-center text-gray-400 dark:text-gray-500 flex flex-col items-center">
                        <svg class="w-16 h-16 mb-4 text-gray-200 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <p>Belum ada klien aktif.</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @if(session('new_account'))
    <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center z-50 p-4 transition-opacity duration-300">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 max-w-lg w-full transform scale-100 animate-bounce-in transition-colors">
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                    <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">Akun Berhasil Dibuat!</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Salin detail login ini sebelum menutup.</p>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700/50 p-5 rounded-xl border border-gray-200 dark:border-gray-700 mb-6 font-mono text-sm space-y-3">
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-600 pb-2">
                    <span class="text-gray-500 dark:text-gray-400 font-bold">Email:</span> 
                    <span class="select-all font-bold text-gray-800 dark:text-white">{{ session('new_account')['email'] }}</span>
                </div>
                <div class="flex justify-between items-center pt-1">
                    <span class="text-gray-500 dark:text-gray-400 font-bold">Password:</span> 
                    <span class="select-all bg-white dark:bg-gray-600 px-3 py-1 rounded border border-gray-300 dark:border-gray-500 text-red-600 dark:text-red-400 font-bold tracking-widest">{{ session('new_account')['password'] }}</span>
                </div>
            </div>

            <div class="mb-6">
                <label class="text-xs text-gray-500 dark:text-gray-400 font-bold mb-2 block uppercase tracking-wide">Template Pesan WhatsApp:</label>
                <div class="relative">
                    <textarea id="waMessage" class="w-full text-sm p-4 border border-gray-300 dark:border-gray-600 rounded-xl h-32 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none resize-none font-sans leading-relaxed" readonly>Halo Kak, undangan sudah aktif! 🎉

Login Dashboard:
🔗 {{ url('/login') }}
📧 {{ session('new_account')['email'] }}
🔑 {{ session('new_account')['password'] }}

Terima kasih!</textarea>
                    <button onclick="navigator.clipboard.writeText(document.getElementById('waMessage').value); this.innerText='Disalin!'" class="absolute top-2 right-2 bg-white dark:bg-gray-800 text-xs border dark:border-gray-600 shadow-sm px-2 py-1 rounded text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold">Salin</button>
                </div>
            </div>

            <button onclick="this.closest('.fixed').remove()" class="bg-gray-900 hover:bg-black dark:bg-indigo-600 dark:hover:bg-indigo-700 text-white font-bold py-3.5 px-6 rounded-xl w-full transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Selesai & Tutup
            </button>
        </div>
    </div>
    @endif

    @if(session('reset_success'))
    <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 max-w-lg w-full transform scale-100 transition-colors">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Password Direset!</h2>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/10 p-4 rounded-xl border border-yellow-200 dark:border-yellow-800 mb-6 font-mono text-sm text-center">
                <p class="text-yellow-800 dark:text-yellow-300 mb-2 font-bold">Password Baru:</p>
                <div class="select-all text-2xl font-bold text-gray-900 dark:text-white bg-white dark:bg-gray-700 py-2 rounded border border-yellow-300 dark:border-yellow-700 tracking-widest">{{ session('reset_success')['password'] }}</div>
            </div>

            <button onclick="this.closest('.fixed').remove()" class="bg-gray-900 hover:bg-black dark:bg-indigo-600 dark:hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl w-full transition">Tutup</button>
        </div>
    </div>
    @endif

    <script>
        // 1. Toast Notification untuk Sukses (Pojok Kanan Atas)
        @if(session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#ECFDF5', // Green-50
                color: '#065F46',      // Green-800
                iconColor: '#34D399',  // Green-400
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif

        // 2. Fungsi Konfirmasi ACC (Lebih Modern)
        function konfirmasiSwalACC(event, namaPasangan) {
            event.preventDefault();
            const form = event.target;

            Swal.fire({
                title: 'Aktifkan Order?',
                html: "Anda akan mengaktifkan undangan untuk:<br><b>" + namaPasangan + "</b>",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#4F46E5', // Indigo
                cancelButtonColor: '#9CA3AF',
                confirmButtonText: 'Ya, Aktifkan!',
                cancelButtonText: 'Batal',
                background: '#fff',
                width: '400px',
                padding: '2em',
                backdrop: `
                    rgba(0,0,123,0.1)
                    left top
                    no-repeat
                `,
                showLoaderOnConfirm: true, // Efek loading saat diklik
                preConfirm: () => {
                    form.submit(); // Submit form setelah loading
                }
            });
        }

        // 3. Fungsi Konfirmasi Reset Password
        function konfirmasiSwalReset(event, email) {
            event.preventDefault();
            const form = event.target;

            Swal.fire({
                title: 'Reset Password?',
                html: "Password akun <b>" + email + "</b> akan dihapus dan diganti baru.",
                icon: 'warning',
                iconColor: '#EF4444',
                showCancelButton: true,
                confirmButtonColor: '#EF4444', // Red
                cancelButtonColor: '#9CA3AF',
                confirmButtonText: 'Ya, Reset Password',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    form.submit();
                }
            });
        }
    </script>
</x-app-layout>