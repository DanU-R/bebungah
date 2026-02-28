<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Undangan') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 via-white to-indigo-50/30 dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-indigo-950/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ALERTS --}}
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-300 px-5 py-4 rounded-xl shadow flex items-center gap-3 animate-slideDown" role="alert">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-green-600 hover:text-green-800"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
            @endif
            @if($errors->any())
                <div class="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 px-5 py-4 rounded-xl shadow" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <ul class="list-disc pl-5 mt-1 space-y-1 text-sm">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif

            {{-- HEADER WELCOME --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100 dark:border-gray-700">
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-extrabold text-white">Halo, {{ Auth::user()->name }}! 👋</h3>
                                    <p class="text-white/80 text-sm">Selamat datang kembali di dashboard Anda</p>
                                </div>
                            </div>
                            @if(isset($invitation))
                                <div class="flex items-center gap-2 bg-white/15 backdrop-blur-sm px-4 py-2 rounded-xl max-w-fit">
                                    <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101"/></svg>
                                    <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="text-white font-semibold hover:underline text-sm truncate max-w-xs">{{ url('undangan/' . $invitation->slug) }}</a>
                                    <button onclick="copyToClipboard('{{ url('undangan/' . $invitation->slug) }}')" class="text-white/80 hover:text-white transition ml-1" title="Salin Link">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    </button>
                                </div>
                            @else
                                <div class="inline-flex items-center gap-2 bg-yellow-500/20 px-3 py-2 rounded-xl">
                                    <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="text-sm text-white font-semibold">Belum memiliki undangan aktif</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            @if(isset($invitation))
                                <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="group px-5 py-3 bg-white/20 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/30 transition flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Lihat Undangan
                                </a>
                                <a href="{{ route('client.settings') }}" class="group px-5 py-3 bg-white text-indigo-600 font-bold rounded-xl hover:bg-gray-50 transition shadow flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit Undangan
                                </a>
                            @else
                                <a href="{{ route('order.create') }}" class="px-6 py-3 bg-white text-indigo-600 font-bold rounded-xl hover:bg-gray-50 transition shadow flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Buat Undangan Baru
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- INFO CARD: Countdown + Detail Undangan --}}
            @if(isset($invitation) && $invitation->event_date)
            @php
                $eventDate = \Carbon\Carbon::parse($invitation->event_date);
                $daysLeft = now()->startOfDay()->diffInDays($eventDate->startOfDay(), false);
                $groomName = $invitation->content['mempelai']['pria']['nama'] ?? null;
                $brideName = $invitation->content['mempelai']['wanita']['nama'] ?? null;
                $resepsiTime = $invitation->content['acara']['resepsi']['waktu'] ?? null;
                $resepsiPlace = $invitation->content['acara']['resepsi']['tempat'] ?? null;
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Countdown --}}
                <div class="bg-gradient-to-br from-indigo-600 to-purple-700 p-6 rounded-2xl shadow-lg text-white flex flex-col justify-between">
                    <div class="text-sm font-semibold text-white/70 uppercase tracking-wider mb-2">⏳ Hitung Mundur</div>
                    @if($daysLeft > 0)
                        <div class="text-5xl font-black leading-none">{{ $daysLeft }}</div>
                        <div class="text-white/80 mt-1 font-medium">hari lagi menuju hari H</div>
                    @elseif($daysLeft == 0)
                        <div class="text-3xl font-black">🎉 Hari H!</div>
                        <div class="text-white/80 mt-1">Selamat atas hari istimewamu!</div>
                    @else
                        <div class="text-3xl font-black">{{ abs($daysLeft) }} hari lalu</div>
                        <div class="text-white/80 mt-1">Semoga momennya indah!</div>
                    @endif
                    <div class="mt-3 text-xs text-white/60">{{ $eventDate->translatedFormat('d F Y') }}</div>
                </div>

                {{-- Info Mempelai --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow border border-gray-100 dark:border-gray-700">
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">💍 Mempelai</div>
                    @if($groomName || $brideName)
                        <div class="space-y-2">
                            @if($groomName)<div class="flex items-center gap-2"><div class="w-8 h-8 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center text-indigo-700 dark:text-indigo-300 font-bold text-sm">{{ substr($groomName,0,1) }}</div><span class="font-semibold text-gray-800 dark:text-white text-sm">{{ $groomName }}</span></div>@endif
                            @if($groomName && $brideName)<div class="text-center text-gray-400 text-xs font-medium">&amp;</div>@endif
                            @if($brideName)<div class="flex items-center gap-2"><div class="w-8 h-8 bg-pink-100 dark:bg-pink-900 rounded-full flex items-center justify-center text-pink-700 dark:text-pink-300 font-bold text-sm">{{ substr($brideName,0,1) }}</div><span class="font-semibold text-gray-800 dark:text-white text-sm">{{ $brideName }}</span></div>@endif
                        </div>
                    @else
                        <p class="text-sm text-gray-400 italic">Data mempelai belum diisi. <a href="{{ route('client.settings') }}" class="text-indigo-600 font-semibold hover:underline">Lengkapi →</a></p>
                    @endif
                </div>

                {{-- Info Acara --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow border border-gray-100 dark:border-gray-700">
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">📍 Lokasi Resepsi</div>
                    @if($resepsiPlace)
                        <p class="font-semibold text-gray-800 dark:text-white text-sm">{{ $resepsiPlace }}</p>
                        @if($resepsiTime)
                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($resepsiTime)->translatedFormat('d F Y, H:i') }} WIB</p>
                        @endif
                    @else
                        <p class="text-sm text-gray-400 italic">Lokasi belum diisi. <a href="{{ route('client.settings') }}" class="text-indigo-600 font-semibold hover:underline">Lengkapi →</a></p>
                    @endif
                    <div class="mt-3 pt-3 border-t dark:border-gray-700">
                        <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full
                            {{ $invitation->status === 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $invitation->status === 'active' ? 'bg-green-500' : 'bg-yellow-500 animate-pulse' }}"></span>
                            {{ $invitation->status === 'active' ? 'Undangan Aktif' : ucfirst($invitation->status) }}
                        </span>
                    </div>
                </div>
            </div>
            @endif

            {{-- STAT CARDS with Progress Bars --}}
            @php
                $tamuCol = collect($guests ?? []);
                $total     = $tamuCol->count();
                $hadir     = $tamuCol->where('rsvp_status','hadir')->count();
                $tidakHadir = $tamuCol->whereIn('rsvp_status',['tidak_hadir','ragu'])->count();
                $pending   = $tamuCol->whereIn('rsvp_status',['pending',null])->count();
            @endphp
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach([
                    ['Total Tamu','👥',$total,100,'indigo'],
                    ['Akan Hadir','✅',$hadir,$total > 0 ? round($hadir/$total*100) : 0,'green'],
                    ['Tidak Hadir','❌',$tidakHadir,$total > 0 ? round($tidakHadir/$total*100) : 0,'red'],
                    ['Belum Respon','⏳',$pending,$total > 0 ? round($pending/$total*100) : 0,'yellow'],
                ] as [$label,$icon,$val,$pct,$col])
                <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow border border-gray-100 dark:border-gray-700 hover:shadow-lg transition hover:-translate-y-0.5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-2xl">{{ $icon }}</span>
                        <span class="text-xs font-bold text-{{ $col }}-600 dark:text-{{ $col }}-400 bg-{{ $col }}-50 dark:bg-{{ $col }}-900/20 px-2 py-0.5 rounded-full">{{ $pct }}%</span>
                    </div>
                    <div class="text-3xl font-extrabold text-gray-900 dark:text-white mb-0.5">{{ $val }}</div>
                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 mb-3">{{ $label }}</div>
                    <div class="w-full bg-gray-100 dark:bg-gray-700 rounded-full h-1.5">
                        <div class="bg-{{ $col }}-500 h-1.5 rounded-full transition-all duration-700" style="width: {{ $pct }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- MAIN GRID --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- LEFT: Forms --}}
                <div class="space-y-5">
                    {{-- Form Tambah Tamu --}}
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2.5 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 dark:text-white">Tambah Tamu</h3>
                                <p class="text-xs text-gray-500">Input manual per tamu</p>
                            </div>
                        </div>
                        <form action="{{ route('client.storeGuest') }}" method="POST" class="space-y-3">
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide mb-1">Nama Tamu <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition px-3 py-2.5 text-sm" placeholder="Budi Santoso">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide mb-1">No. WhatsApp</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 border-2 border-r-0 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-500 rounded-l-xl text-sm">+62</span>
                                    <input type="text" name="whatsapp" class="flex-1 rounded-r-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition px-3 py-2.5 text-sm" placeholder="8123456789">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide mb-1">Kategori</label>
                                    <select name="category" class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 px-3 py-2.5 text-sm">
                                        <option>Umum</option>
                                        <option>Keluarga</option>
                                        <option>Teman</option>
                                        <option>VIP</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide mb-1">Kota</label>
                                    <input type="text" name="address" class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 transition px-3 py-2.5 text-sm" placeholder="Jakarta">
                                </div>
                            </div>
                            <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl text-sm font-bold shadow transition hover:scale-[1.02] flex justify-center items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Simpan Tamu
                            </button>
                        </form>
                    </div>

                    {{-- Form Import Excel --}}
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2.5 bg-gradient-to-br from-green-500 to-emerald-600 text-white rounded-xl shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 dark:text-white">Import Excel</h3>
                                <p class="text-xs text-gray-500">Upload file .xlsx / .csv</p>
                            </div>
                        </div>
                        <form action="{{ route('client.importGuests') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                            @csrf
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 text-center hover:bg-gray-50 dark:hover:bg-gray-700 transition cursor-pointer" onclick="document.getElementById('fileCsv').click()">
                                <input type="file" name="file" id="fileCsv" class="hidden" accept=".csv,.txt,.xlsx,.xls" onchange="updateFileName(this)">
                                <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <p class="text-sm text-gray-500"><span class="font-semibold text-indigo-600">Klik untuk upload</span></p>
                                <p class="text-xs text-gray-400 mt-1">.xlsx, .xls, .csv (Max 2MB)</p>
                            </div>
                            <div id="fileNameDisplay" class="hidden p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <p class="text-xs text-green-700 dark:text-green-300 font-medium truncate" id="fileNameText"></p>
                            </div>
                            <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl text-sm font-bold shadow transition hover:scale-[1.02] flex justify-center items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                Import Data Tamu
                            </button>
                        </form>
                        <div class="mt-4 pt-4 border-t dark:border-gray-700 flex flex-col gap-2">
                            <a href="{{ route('client.downloadTemplate') }}" class="flex items-center justify-center gap-2 text-sm text-indigo-600 dark:text-indigo-400 font-semibold hover:text-indigo-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download Template Excel
                            </a>
                            @if(isset($invitation) && count($guests ?? []) > 0)
                            <a href="{{ route('client.exportGuests', $invitation->id) }}" class="flex items-center justify-center gap-2 text-sm text-green-600 dark:text-green-400 font-semibold hover:text-green-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4 8l-4-4m0 0l4-4m-4 4h12"/></svg>
                                Export Daftar Hadir (CSV)
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Guest Table --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">
                    {{-- Table Header + Search --}}
                    <div class="p-5 border-b dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-gradient-to-br from-purple-500 to-pink-600 text-white rounded-xl shadow">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Daftar Tamu</h3>
                                    <p class="text-xs text-gray-500" id="guestCountDisplay">{{ count($guests ?? []) }} tamu</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                {{-- Search --}}
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <input type="text" id="guestSearch" onkeyup="filterGuests()" placeholder="Cari tamu..." class="pl-9 pr-4 py-2 border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl text-sm focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition w-40">
                                </div>
                                {{-- Filter RSVP --}}
                                <select id="rsvpFilter" onchange="filterGuests()" class="border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl text-sm px-3 py-2 focus:border-indigo-400 outline-none transition">
                                    <option value="">Semua</option>
                                    <option value="hadir">Hadir</option>
                                    <option value="tidak_hadir">Tidak Hadir</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if(isset($invitation) && count($guests ?? []) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm" id="guestTable">
                            <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-600">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tamu</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">WhatsApp</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">RSVP</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider hidden md:table-cell">Ucapan</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700" id="guestTableBody">
                                @foreach($guests as $guest)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/40 transition guest-row"
                                    data-name="{{ strtolower($guest->name) }}"
                                    data-rsvp="{{ $guest->rsvp_status ?? 'pending' }}">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-full flex-shrink-0 flex items-center justify-center">
                                                <span class="text-indigo-700 dark:text-indigo-300 font-bold text-xs">{{ substr($guest->name,0,1) }}</span>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900 dark:text-white text-sm leading-tight">{{ $guest->name }}</p>
                                                <span class="inline-flex items-center text-[10px] px-1.5 py-0.5 rounded-full font-medium
                                                    {{ $guest->category === 'VIP' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400' }}">
                                                    {{ $guest->category == 'VIP' ? '⭐ ' : '' }}{{ $guest->category ?? 'Umum' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($guest->whatsapp)
                                            <a href="https://wa.me/62{{ ltrim($guest->whatsapp,'0') }}" target="_blank" class="text-xs text-green-600 hover:text-green-800 font-medium flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                                {{ $guest->whatsapp }}
                                            </a>
                                        @else
                                            <span class="text-xs text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($guest->rsvp_status == 'hadir')
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Hadir
                                            </span>
                                        @elseif(in_array($guest->rsvp_status, ['tidak_hadir','ragu']))
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-red-50 text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> {{ $guest->rsvp_status == 'tidak_hadir' ? 'Tidak Hadir' : 'Ragu' }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800">
                                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span> Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 hidden md:table-cell">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 max-w-[120px] truncate" title="{{ $guest->comment }}">{{ $guest->comment ?? '-' }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end gap-1">
                                            {{-- Copy Link --}}
                                            <button onclick="copyToClipboard('{{ route('invitation.show', ['slug'=>$invitation->slug,'to'=>$guest->slug]) }}')" class="p-1.5 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-lg transition" title="Salin Link">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3"/></svg>
                                            </button>
                                            {{-- Kirim WA (fixed URL encoding) --}}
                                            @php
                                                $pPria = $invitation->content['mempelai']['pria']['panggilan'] ?? 'Mempelai Pria';
                                                $pWanita = $invitation->content['mempelai']['wanita']['panggilan'] ?? 'Mempelai Wanita';
                                                
                                                $pesanWa = "Assalamu'alaikum Warahmatullahi Wabarakatuh / Selamat Sejahtera,\n\n"
                                                         . "Kepada Yth. *{$guest->name}*,\n\n"
                                                         . "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu pada acara pernikahan kami:\n\n"
                                                         . "👰🤵 *{$pPria} & {$pWanita}*\n\n"
                                                         . "Informasi lengkap mengenai jadwal, lokasi, dan konfirmasi kehadiran (RSVP) dapat dilihat melalui tautan undangan digital berikut ini:\n\n"
                                                         . route('invitation.show', ['slug'=>$invitation->slug,'to'=>$guest->slug]) . "\n\n"
                                                         . "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir di hari istimewa kami.\n\n"
                                                         . "Terima kasih,\n"
                                                         . "Wassalamu'alaikum Warahmatullahi Wabarakatuh.";
                                                         
                                                $waText = urlencode($pesanWa);
                                            @endphp
                                            <a href="https://wa.me/?text={{ $waText }}" target="_blank" class="p-1.5 text-gray-400 hover:text-green-600 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition" title="Kirim WA">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z"/></svg>
                                            </a>
                                            {{-- Lihat Undangan --}}
                                            <a href="{{ route('invitation.show', ['slug'=>$invitation->slug,'to'=>$guest->slug]) }}" target="_blank" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition" title="Lihat Undangan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            </a>
                                            {{-- Hapus Tamu --}}
                                            <form action="{{ route('client.deleteGuest', $guest->id) }}" method="POST" onsubmit="return confirm('Hapus tamu \"{{ addslashes($guest->name) }}\"?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition" title="Hapus">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="noGuestResult" class="hidden py-10 text-center text-gray-400 text-sm">Tidak ada tamu yang cocok.</div>
                    </div>
                    @else
                        <div class="p-10 text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-indigo-100 dark:from-gray-700 dark:to-indigo-900 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-1">Belum Ada Data Tamu</h4>
                            <p class="text-gray-400 text-sm mb-5">Tambahkan tamu via upload Excel atau input manual di kiri</p>
                            <div class="flex gap-3 justify-center flex-wrap">
                                <button onclick="document.getElementById('fileCsv').click()" class="px-5 py-2.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl font-bold text-sm shadow transition">Upload Excel</button>
                                <button onclick="document.querySelector('input[name=name]').focus()" class="px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl font-bold text-sm shadow transition">Input Manual</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <style>
        @keyframes slideDown { from { opacity: 0; transform: translateY(-15px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slideDown { animation: slideDown 0.4s ease-out; }
    </style>

    <script>
        function updateFileName(input) {
            const box = document.getElementById('fileNameDisplay');
            const txt = document.getElementById('fileNameText');
            if (input.files && input.files.length > 0) {
                const f = input.files[0];
                txt.textContent = f.name + ' (' + (f.size/1024).toFixed(1) + ' KB)';
                box.classList.remove('hidden');
            } else { box.classList.add('hidden'); }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => showToast('Link berhasil disalin! 🎉', 'success')).catch(() => showToast('Gagal menyalin link', 'error'));
        }

        function showToast(message, type = 'success') {
            const existing = document.getElementById('customToast');
            if (existing) existing.remove();
            const t = document.createElement('div');
            t.id = 'customToast';
            t.className = `fixed bottom-6 right-6 z-50 px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 font-semibold text-sm text-white transition-all duration-300 ${type === 'success' ? 'bg-gradient-to-r from-green-500 to-emerald-600' : 'bg-gradient-to-r from-red-500 to-pink-600'}`;
            t.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}"/></svg>${message}`;
            document.body.appendChild(t);
            setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateX(400px)'; setTimeout(() => t.remove(), 300); }, 3000);
        }

        function filterGuests() {
            const search = document.getElementById('guestSearch').value.toLowerCase();
            const rsvp = document.getElementById('rsvpFilter').value;
            const rows = document.querySelectorAll('.guest-row');
            let visible = 0;
            rows.forEach(row => {
                const name = row.dataset.name || '';
                const status = row.dataset.rsvp || '';
                const matchSearch = !search || name.includes(search);
                const matchRsvp = !rsvp || status === rsvp || (rsvp === 'pending' && (status === 'pending' || status === ''));
                if (matchSearch && matchRsvp) { row.style.display = ''; visible++; } else { row.style.display = 'none'; }
            });
            const noResult = document.getElementById('noGuestResult');
            if (noResult) noResult.classList.toggle('hidden', visible > 0);
            const countEl = document.getElementById('guestCountDisplay');
            if (countEl) countEl.textContent = visible + ' tamu' + (search || rsvp ? ' ditemukan' : '');
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[role="alert"]').forEach(el => {
                setTimeout(() => { el.style.opacity = '0'; el.style.transform = 'translateY(-10px)'; el.style.transition = 'all 0.3s'; setTimeout(() => el.remove(), 300); }, 5000);
            });
        });
    </script>
</x-app-layout>