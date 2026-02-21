<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight flex items-center gap-3">
                <span class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </span>
                {{ __('Edit Undangan') }}
            </h2>
            <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="group inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-2xl text-sm font-semibold shadow-xl shadow-indigo-500/25 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/40 hover:-translate-y-1">
                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Lihat Website
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 min-h-screen pb-32">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="bg-gradient-to-r from-emerald-500 to-green-500 text-white p-5 rounded-2xl shadow-xl shadow-green-500/25 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="font-bold text-lg">Berhasil Disimpan!</p>
                        <p class="text-white/80 text-sm">Perubahan telah tersimpan dengan sukses</p>
                    </div>
                </div>
                <button @click="show = false" class="w-10 h-10 rounded-xl bg-white/20 hover:bg-white/30 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="bg-gradient-to-r from-red-500 to-rose-500 text-white p-5 rounded-2xl shadow-xl shadow-red-500/25">
                <div class="flex items-center gap-4 mb-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <p class="font-bold text-lg">Periksa Inputan Anda</p>
                </div>
                <ul class="list-disc pl-16 text-sm space-y-1 text-white/90">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('client.updateSettings') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Section 1: Profile Mempelai -->
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon bg-gradient-to-br from-pink-500 to-rose-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="settings-title">Profile Mempelai</h3>
                            <p class="settings-subtitle">Informasi lengkap kedua mempelai</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                        <!-- Mempelai Pria -->
                        <div class="profile-card profile-card-groom">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="relative group">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden ring-4 ring-indigo-500/30 shadow-xl">
                                        <img id="prev-groom" src="{{ isset($invitation->content['mempelai']['pria']['foto']) ? asset($invitation->content['mempelai']['pria']['foto']) : 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
                                    </div>
                                    <label class="absolute inset-0 bg-black/50 rounded-2xl opacity-0 group-hover:opacity-100 flex items-center justify-center cursor-pointer transition-opacity">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <input type="file" name="groom_photo" onchange="previewImage(this, 'prev-groom')" class="hidden">
                                    </label>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-indigo-600 dark:text-indigo-400">Mempelai Pria</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Klik foto untuk mengubah</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="input-group">
                                    <label class="input-label">Nama Lengkap</label>
                                    <input type="text" name="groom_name" value="{{ $invitation->content['mempelai']['pria']['nama'] ?? '' }}" class="input-field" placeholder="Nama Lengkap Pria">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label class="input-label">Panggilan</label>
                                        <input type="text" name="groom_nickname" value="{{ $invitation->content['mempelai']['pria']['panggilan'] ?? '' }}" class="input-field" placeholder="Romeo">
                                    </div>
                                    <div class="input-group">
                                        <label class="input-label">Instagram</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">@</span>
                                            <input type="text" name="groom_instagram" value="{{ $invitation->content['mempelai']['pria']['instagram'] ?? '' }}" class="input-field pl-8" placeholder="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Nama Ayah</label>
                                    <input type="text" name="groom_father" value="{{ $invitation->content['mempelai']['pria']['ayah'] ?? '' }}" class="input-field" placeholder="Bpk...">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Nama Ibu</label>
                                    <input type="text" name="groom_mother" value="{{ $invitation->content['mempelai']['pria']['ibu'] ?? '' }}" class="input-field" placeholder="Ibu...">
                                </div>
                            </div>
                        </div>

                        <!-- Mempelai Wanita -->
                        <div class="profile-card profile-card-bride">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="relative group">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden ring-4 ring-pink-500/30 shadow-xl">
                                        <img id="prev-bride" src="{{ isset($invitation->content['mempelai']['wanita']['foto']) ? asset($invitation->content['mempelai']['wanita']['foto']) : 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
                                    </div>
                                    <label class="absolute inset-0 bg-black/50 rounded-2xl opacity-0 group-hover:opacity-100 flex items-center justify-center cursor-pointer transition-opacity">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <input type="file" name="bride_photo" onchange="previewImage(this, 'prev-bride')" class="hidden">
                                    </label>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-pink-600 dark:text-pink-400">Mempelai Wanita</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Klik foto untuk mengubah</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="input-group">
                                    <label class="input-label">Nama Lengkap</label>
                                    <input type="text" name="bride_name" value="{{ $invitation->content['mempelai']['wanita']['nama'] ?? '' }}" class="input-field" placeholder="Nama Lengkap Wanita">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label class="input-label">Panggilan</label>
                                        <input type="text" name="bride_nickname" value="{{ $invitation->content['mempelai']['wanita']['panggilan'] ?? '' }}" class="input-field" placeholder="Juliet">
                                    </div>
                                    <div class="input-group">
                                        <label class="input-label">Instagram</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">@</span>
                                            <input type="text" name="bride_instagram" value="{{ $invitation->content['mempelai']['wanita']['instagram'] ?? '' }}" class="input-field pl-8" placeholder="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Nama Ayah</label>
                                    <input type="text" name="bride_father" value="{{ $invitation->content['mempelai']['wanita']['ayah'] ?? '' }}" class="input-field" placeholder="Bpk...">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Nama Ibu</label>
                                    <input type="text" name="bride_mother" value="{{ $invitation->content['mempelai']['wanita']['ibu'] ?? '' }}" class="input-field" placeholder="Ibu...">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-6 pb-6">
                        <div class="input-group">
                            <label class="input-label">Quote Undangan</label>
                            <textarea name="quote" rows="3" class="input-field" placeholder="Tulis kata-kata mutiara yang bermakna...">{{ $invitation->content['quote'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Rangkaian Acara -->
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon bg-gradient-to-br from-amber-500 to-orange-500">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="settings-title">Rangkaian Acara</h3>
                            <p class="settings-subtitle">Jadwal dan lokasi acara pernikahan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                        <!-- Akad -->
                        <div class="event-card">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">Akad Nikah</h4>
                            </div>
                            <div class="space-y-4">
                                <div class="input-group">
                                    <label class="input-label">Judul Acara</label>
                                    <input type="text" name="akad_title" value="{{ $invitation->content['acara']['akad']['judul'] ?? '' }}" class="input-field" placeholder="Akad Nikah">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Waktu</label>
                                    <input type="datetime-local" name="akad_datetime" value="{{ isset($invitation->content['acara']['akad']['waktu']) ? \Carbon\Carbon::parse($invitation->content['acara']['akad']['waktu'])->format('Y-m-d\TH:i') : '' }}" class="input-field">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Lokasi</label>
                                    <input type="text" name="akad_location" value="{{ $invitation->content['acara']['akad']['tempat'] ?? '' }}" class="input-field" placeholder="Masjid Agung">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Alamat Lengkap</label>
                                    <textarea name="akad_address" rows="2" class="input-field">{{ $invitation->content['acara']['akad']['alamat'] ?? '' }}</textarea>
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Link Maps</label>
                                    <input type="text" name="akad_map_link" value="{{ $invitation->content['acara']['akad']['maps'] ?? '' }}" class="input-field" placeholder="https://maps.google.com/...">
                                </div>
                            </div>
                        </div>

                        <!-- Resepsi -->
                        <div class="event-card">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white">Resepsi</h4>
                            </div>
                            <div class="space-y-4">
                                <div class="input-group">
                                    <label class="input-label">Judul Acara</label>
                                    <input type="text" name="resepsi_title" value="{{ $invitation->content['acara']['resepsi']['judul'] ?? '' }}" class="input-field" placeholder="Resepsi">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Waktu</label>
                                    <input type="datetime-local" name="resepsi_datetime" value="{{ isset($invitation->content['acara']['resepsi']['waktu']) ? \Carbon\Carbon::parse($invitation->content['acara']['resepsi']['waktu'])->format('Y-m-d\TH:i') : '' }}" class="input-field">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Lokasi</label>
                                    <input type="text" name="resepsi_location" value="{{ $invitation->content['acara']['resepsi']['tempat'] ?? '' }}" class="input-field" placeholder="Hotel...">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Alamat Lengkap</label>
                                    <textarea name="resepsi_address" rows="2" class="input-field">{{ $invitation->content['acara']['resepsi']['alamat'] ?? '' }}</textarea>
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Link Maps</label>
                                    <input type="text" name="resepsi_map_link" value="{{ $invitation->content['acara']['resepsi']['maps'] ?? '' }}" class="input-field" placeholder="https://maps.google.com/...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Media & Galeri -->
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon bg-gradient-to-br from-violet-500 to-purple-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="settings-title">Media & Galeri</h3>
                            <p class="settings-subtitle">Foto, video, dan musik untuk undangan</p>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="upload-card">
                                <div class="upload-icon">
                                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <h5 class="font-semibold text-gray-800 dark:text-white mb-1">Foto Cover</h5>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Foto utama undangan</p>
                                <input type="file" name="cover_image" class="file-input">
                                @if(isset($invitation->content['media']['cover']))
                                    <span class="inline-flex items-center gap-1 text-xs text-emerald-600 mt-2"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Cover tersedia</span>
                                @endif
                            </div>
                            <div class="upload-card">
                                <div class="upload-icon">
                                    <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                                </div>
                                <h5 class="font-semibold text-gray-800 dark:text-white mb-1">Background Musik</h5>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Format MP3</p>
                                <input type="file" name="music_file" accept=".mp3" class="file-input">
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Link Video YouTube</label>
                            <input type="text" name="video_link" value="{{ $invitation->content['media']['video_link'] ?? '' }}" class="input-field" placeholder="https://www.youtube.com/embed/...">
                        </div>

                        <div class="upload-card">
                            <div class="upload-icon">
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h5 class="font-semibold text-gray-800 dark:text-white mb-1">Galeri Foto</h5>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Upload banyak foto sekaligus</p>
                            <input type="file" name="gallery_photos[]" multiple class="file-input">
                        </div>
                        
                        @if(isset($invitation->content['media']['gallery']) && count($invitation->content['media']['gallery']) > 0)
                            <div class="grid grid-cols-3 md:grid-cols-6 gap-3 mt-4">
                                @foreach($invitation->content['media']['gallery'] as $photo)
                                    <div class="aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                                        <img src="{{ asset($photo) }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Section 4: Love Story -->
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon bg-gradient-to-br from-rose-500 to-pink-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="settings-title">Love Story</h3>
                            <p class="settings-subtitle">Ceritakan perjalanan cinta kalian</p>
                        </div>
                    </div>

                    @php 
                        $stories = $invitation->content['love_stories'] ?? []; 
                        for($i=count($stories); $i<3; $i++) {
                            $stories[] = ['year' => '', 'title' => '', 'story' => '', 'image' => null];
                        }
                    @endphp

                    <div class="p-6 space-y-4">
                        @foreach ($stories as $index => $story)
                        <div class="story-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-lg">{{ $index + 1 }}</div>
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Bagian {{ $index + 1 }}</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                                <div class="md:col-span-2">
                                    <label class="input-label">Tahun</label>
                                    <input type="text" name="love_stories[{{ $index }}][year]" value="{{ $story['year'] ?? '' }}" class="input-field text-center" placeholder="2020">
                                </div>
                                <div class="md:col-span-4">
                                    <label class="input-label">Judul</label>
                                    <input type="text" name="love_stories[{{ $index }}][title]" value="{{ $story['title'] ?? '' }}" class="input-field" placeholder="Pertama Bertemu">
                                </div>
                                <div class="md:col-span-6">
                                    <label class="input-label">Cerita</label>
                                    <textarea name="love_stories[{{ $index }}][story]" rows="1" class="input-field" placeholder="Cerita singkat...">{{ $story['story'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Section 5: Amplop Digital -->
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon bg-gradient-to-br from-emerald-500 to-teal-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="settings-title">Amplop Digital</h3>
                            <p class="settings-subtitle">Informasi transfer dan kirim kado</p>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="input-group">
                                <label class="input-label">Bank / E-Wallet</label>
                                <input type="text" name="bank_name" value="{{ $invitation->content['amplop']['bank_name'] ?? '' }}" class="input-field" placeholder="BCA">
                            </div>
                            <div class="input-group">
                                <label class="input-label">No Rekening</label>
                                <input type="text" name="bank_number" value="{{ $invitation->content['amplop']['account_number'] ?? '' }}" class="input-field" placeholder="1234567890">
                            </div>
                            <div class="input-group">
                                <label class="input-label">Atas Nama</label>
                                <input type="text" name="bank_holder" value="{{ $invitation->content['amplop']['account_holder'] ?? '' }}" class="input-field" placeholder="Nama Pemilik">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="input-group">
                                <label class="input-label">Alamat Kirim Kado</label>
                                <textarea name="gift_address" rows="2" class="input-field" placeholder="Jalan...">{{ $invitation->content['amplop']['alamat_kado'] ?? '' }}</textarea>
                            </div>
                            <div class="input-group">
                                <label class="input-label">Link Maps Alamat Kado</label>
                                <input type="text" name="gift_map_link" value="{{ $invitation->content['amplop']['maps_kado'] ?? '' }}" class="input-field" placeholder="https://maps.google.com/...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fixed Save Button -->
                <div class="fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-700/50 p-4 z-50 shadow-2xl shadow-black/10">
                    <div class="max-w-5xl mx-auto flex items-center justify-between gap-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400 hidden md:block">
                            <span class="inline-flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Jangan lupa simpan perubahan</span>
                        </p>
                        <button type="submit" class="group bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-4 px-10 rounded-2xl shadow-xl shadow-indigo-500/30 transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/40 hover:-translate-y-1 w-full md:w-auto flex items-center justify-center gap-3">
                            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <style>
        /* Settings Card */
        .settings-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
        }
        .dark .settings-card {
            background: rgb(17 24 39);
            border-color: rgba(55, 65, 81, 0.5);
        }

        .settings-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
            background: linear-gradient(to right, rgba(249, 250, 251, 0.5), transparent);
        }
        .dark .settings-header {
            border-color: rgba(55, 65, 81, 0.5);
            background: linear-gradient(to right, rgba(31, 41, 55, 0.5), transparent);
        }

        .settings-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .settings-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
        }
        .dark .settings-title {
            color: white;
        }

        .settings-subtitle {
            font-size: 0.875rem;
            color: #6b7280;
        }
        .dark .settings-subtitle {
            color: #9ca3af;
        }

        /* Profile Cards */
        .profile-card {
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8), rgba(243, 244, 246, 0.4));
            border-radius: 1.25rem;
            padding: 1.5rem;
            border: 1px solid rgba(229, 231, 235, 0.8);
        }
        .dark .profile-card {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(17, 24, 39, 0.4));
            border-color: rgba(55, 65, 81, 0.8);
        }

        /* Event Cards */
        .event-card {
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8), rgba(243, 244, 246, 0.4));
            border-radius: 1.25rem;
            padding: 1.5rem;
            border: 1px solid rgba(229, 231, 235, 0.8);
        }
        .dark .event-card {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(17, 24, 39, 0.4));
            border-color: rgba(55, 65, 81, 0.8);
        }

        /* Story Cards */
        .story-card {
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8), rgba(243, 244, 246, 0.4));
            border-radius: 1rem;
            padding: 1.25rem;
            border: 1px solid rgba(229, 231, 235, 0.8);
        }
        .dark .story-card {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(17, 24, 39, 0.4));
            border-color: rgba(55, 65, 81, 0.8);
        }

        /* Upload Cards */
        .upload-card {
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8), rgba(243, 244, 246, 0.4));
            border: 2px dashed rgba(209, 213, 219, 0.8);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .upload-card:hover {
            border-color: #6366f1;
            background: rgba(99, 102, 241, 0.05);
        }
        .dark .upload-card {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(17, 24, 39, 0.4));
            border-color: rgba(75, 85, 99, 0.8);
        }
        .dark .upload-card:hover {
            border-color: #818cf8;
            background: rgba(99, 102, 241, 0.1);
        }

        .upload-icon {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1rem;
            background: white;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .dark .upload-icon {
            background: rgb(31 41 55);
        }

        /* Input Styles */
        .input-group {
            margin-bottom: 0;
        }

        .input-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
            color: #6b7280;
        }
        .dark .input-label {
            color: #9ca3af;
        }

        .input-field {
            width: 100%;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            background: white;
            color: #1f2937;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .input-field:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        .dark .input-field {
            background: rgb(31 41 55);
            border-color: rgb(55 65 81);
            color: white;
        }
        .dark .input-field:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.2);
        }
        .dark .input-field::placeholder {
            color: #6b7280;
        }

        .file-input {
            font-size: 0.875rem;
            color: #6b7280;
        }
        .dark .file-input {
            color: #9ca3af;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .settings-card {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        .settings-card:nth-child(2) { animation-delay: 0.1s; }
        .settings-card:nth-child(3) { animation-delay: 0.2s; }
        .settings-card:nth-child(4) { animation-delay: 0.3s; }
        .settings-card:nth-child(5) { animation-delay: 0.4s; }
    </style>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) { 
                    preview.src = e.target.result; 
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>