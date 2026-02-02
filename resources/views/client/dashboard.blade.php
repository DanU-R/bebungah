<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Undangan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- NOTIFIKASI SUKSES / ERROR --}}
            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded-xl relative flex items-center gap-2" role="alert">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <div>
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 px-4 py-3 rounded-xl relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <ul class="list-disc pl-5 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- HEADER DASHBOARD --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8 transition-colors">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Halo, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Siap menyebarkan kabar bahagiamu hari ini?</p>
                        
                        @if(isset($invitation))
                            <div class="mt-4 flex items-center gap-2 text-sm text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1 rounded-full w-fit max-w-full overflow-hidden">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="font-bold hover:underline truncate">
                                    {{ url('undangan/' . $invitation->slug) }}
                                </a>
                            </div>
                        @else
                            <div class="mt-4 text-sm text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full w-fit">
                                Anda belum memiliki undangan aktif.
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex gap-3">
                        @if(isset($invitation))
                            <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="px-6 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-bold rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition shadow-sm flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Lihat Web
                            </a>
                            <a href="{{ route('client.settings') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition shadow-lg shadow-indigo-200 dark:shadow-none flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Edit Data
                            </a>
                        @else
                            <a href="{{ route('order.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition shadow-lg">
                                Buat Undangan Baru
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                    $tamuCollection = collect($guests ?? []);

                    $total = $tamuCollection->count();
                    $hadir = $tamuCollection->where('rsvp_status', 'hadir')->count();
                    $tidakHadir =
                        $tamuCollection->where('rsvp_status', 'tidak_hadir')->count() +
                        $tamuCollection->where('rsvp_status', 'ragu')->count();
                    $pending = $tamuCollection->where('rsvp_status', 'pending')->count();

                    $cards = [
                        [
                            'title' => 'Total Tamu',
                            'value' => $total,
                            'icon' => 'blue',
                            'svg' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                        ],
                        [
                            'title' => 'Akan Hadir',
                            'value' => $hadir,
                            'icon' => 'green',
                            'svg' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
                        ],
                        [
                            'title' => 'Absen / Ragu',
                            'value' => $tidakHadir,
                            'icon' => 'red',
                            'svg' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'
                        ],
                        [
                            'title' => 'Belum Respon',
                            'value' => $pending,
                            'icon' => 'yellow',
                            'svg' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                        ]
                    ];
                @endphp

                @foreach($cards as $card)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-{{ $card['icon'] }}-50 dark:bg-{{ $card['icon'] }}-900/20 text-{{ $card['icon'] }}-600 dark:text-{{ $card['icon'] }}-400 rounded-xl">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['svg'] }}"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">{{ $card['title'] }}</p>
                                <h4 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $card['value'] }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="space-y-6">
                    
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Tambah Manual
                        </h3>

                        <form action="{{ route('client.storeGuest') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Tamu <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm" placeholder="Contoh: Budi Santoso">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">No. WhatsApp</label>
                                <input type="text" name="whatsapp" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm" placeholder="Contoh: 08123456789">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                                    <select name="category" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm">
                                        <option value="Umum">Umum</option>
                                        <option value="Keluarga">Keluarga</option>
                                        <option value="Teman">Teman</option>
                                        <option value="VIP">VIP</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Domisili</label>
                                    <input type="text" name="address" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm" placeholder="Kota/Alamat">
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-lg text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-600 shadow-sm transition flex justify-center items-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"></svg>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Import Data Tamu (Excel)
                        </h3>
                        
                        <form action="{{ route('client.importGuests') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Upload File</label>
                                <div class="relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:bg-gray-50 dark:hover:bg-gray-800 transition cursor-pointer" onclick="document.getElementById('fileCsv').click()">
                                    <input type="file" name="file" id="fileCsv" class="hidden" accept=".csv, .txt, .xlsx, .xls" onchange="updateFileName(this)">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <span class="font-medium text-indigo-600 hover:text-indigo-500">Klik upload</span> / drag drop
                                        </div>
                                        <p class="text-xs text-gray-500">.xlsx, .xls, .csv (Maks 2MB)</p>
                                    </div>
                                </div>
                                <div id="fileNameDisplay" class="hidden mt-3 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-sm text-green-700 dark:text-green-300 font-medium truncate" id="fileNameText"></span>
                                </div>
                            </div>

                            <div class="flex justify-center gap-3">
                                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 shadow-lg transition">
                                    Import Data
                                </button>
                            </div>
                        </form>

                        <div class="mt-4 pt-4 border-t dark:border-gray-700 text-center">
                            <a href="{{ route('client.downloadTemplate') }}" class="text-sm text-indigo-600 dark:text-indigo-400 font-bold hover:underline inline-flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download Template
                            </a>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-6 flex items-center justify-between">
                        <span>Daftar Tamu Undangan</span>
                        <span class="text-xs font-normal bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full text-gray-500 dark:text-gray-300">{{ count($guests ?? []) }} Orang</span>
                    </h3>

                    @if(isset($invitation) && count($guests ?? []) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 border-b dark:border-gray-600">
                                <tr>
                                    <th class="px-6 py-3">Nama Tamu</th>
                                    <th class="px-6 py-3">Kategori</th>
                                    <th class="px-6 py-3">Link Undangan</th>
                                    <th class="px-6 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach($guests as $guest)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $guest->name }}</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-[10px] px-2 py-1 rounded-full uppercase tracking-wider font-bold">
                                            {{ $guest->category ?? 'Umum' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <input type="text" value="{{ route('invitation.show', ['slug' => $invitation->slug, 'to' => $guest->slug]) }}" class="w-32 text-xs border border-gray-200 dark:border-gray-600 rounded px-2 py-1 bg-gray-50 dark:bg-gray-900 text-gray-400 dark:text-gray-500" readonly>
                                            <button onclick="copyToClipboard('{{ route('invitation.show', ['slug' => $invitation->slug, 'to' => $guest->slug]) }}')" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800" title="Copy Link">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                            </button>
                                            <a href="https://wa.me/?text=Halo%20{{ $guest->name }},%20kami%20mengundangmu%20ke%20pernikahan%20kami.%20Buka%20link%20ini:%20{{ route('invitation.show', ['slug' => $invitation->slug, 'to' => $guest->slug]) }}" target="_blank" class="text-green-600 dark:text-green-400 hover:text-green-800" title="Kirim WA">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($guest->rsvp_status == 'hadir')
                                            <span class="bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 px-3 py-1 rounded-full text-xs font-bold">Hadir</span>
                                        @elseif($guest->rsvp_status == 'tidak_hadir')
                                            <span class="bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-300 px-3 py-1 rounded-full text-xs font-bold">Absen</span>
                                        @elseif($guest->rsvp_status == 'ragu')
                                            <span class="bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-300 px-3 py-1 rounded-full text-xs font-bold">Ragu</span>
                                        @elseif($guest->rsvp_status == 'pending')
                                            <span class="bg-yellow-100 dark:bg-yellow-900/50 text-yellow-700 dark:text-yellow-300 px-3 py-1 rounded-full text-xs font-bold">Belum Respon</span>
                                        @else
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 px-3 py-1 rounded-full text-xs font-bold">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="text-center py-12 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-800/50">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada data tamu.</p>
                            <p class="text-sm text-gray-400 mt-1">Silakan upload file Excel atau input manual.</p>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>

    {{-- SCRIPT DI FOOTER AGAR DOM READY --}}
    <script>
        function updateFileName(input) {
            const displayBox = document.getElementById('fileNameDisplay');
            const textSpan = document.getElementById('fileNameText');
            
            if (input.files && input.files.length > 0) {
                // Ambil nama file
                textSpan.textContent = input.files[0].name;
                // Tampilkan kotak hijau
                displayBox.classList.remove('hidden');
            } else {
                displayBox.classList.add('hidden');
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Link berhasil disalin!'); 
            }).catch(err => {
                console.error('Gagal menyalin link: ', err);
            });
        }
    </script>
</x-app-layout>