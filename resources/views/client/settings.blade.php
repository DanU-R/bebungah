<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
                {{ __('Edit Data Undangan') }}
            </h2>
            <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-lg transition-transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Lihat Website
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-100 dark:bg-gray-950 min-h-screen pb-40">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-12">

            @if(session('success'))
            <div x-data="{ show: true }" x-show="show" class="bg-green-500 text-white p-4 rounded-xl shadow-lg flex justify-between items-center animate-bounce-in">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-bold">Data Berhasil Disimpan!</span>
                </div>
                <button @click="show = false" class="text-white hover:text-gray-200 font-bold">&times;</button>
            </div>
            @endif

            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-xl shadow-lg">
                <p class="font-bold mb-1">Periksa inputan Anda:</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('client.updateSettings') }}" method="POST" enctype="multipart/form-data" class="space-y-16">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-300 dark:border-gray-700 pb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">1. Profile Mempelai</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h4 class="text-indigo-600 dark:text-indigo-400 font-bold mb-2">Mempelai Pria</h4>
                            
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden border-2 border-indigo-500">
                                    <img id="prev-groom" src="{{ isset($invitation->content['mempelai']['pria']['foto']) ? asset($invitation->content['mempelai']['pria']['foto']) : 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase text-gray-500 dark:text-gray-400 mb-1">Foto Pria</label>
                                    <input type="file" name="groom_photo" onchange="previewImage(this, 'prev-groom')" class="text-xs text-gray-500 dark:text-gray-400">
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="groom_name" value="{{ $invitation->content['mempelai']['pria']['nama'] ?? '' }}" class="form-input" placeholder="Nama Lengkap Pria">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label">Panggilan</label>
                                    <input type="text" name="groom_nickname" value="{{ $invitation->content['mempelai']['pria']['panggilan'] ?? '' }}" class="form-input" placeholder="Romeo">
                                </div>
                                <div>
                                    <label class="form-label">Instagram</label>
                                    <input type="text" name="groom_instagram" value="{{ $invitation->content['mempelai']['pria']['instagram'] ?? '' }}" class="form-input" placeholder="romeo_ig">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="groom_father" value="{{ $invitation->content['mempelai']['pria']['ayah'] ?? '' }}" class="form-input" placeholder="Bpk...">
                            </div>
                            <div>
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" name="groom_mother" value="{{ $invitation->content['mempelai']['pria']['ibu'] ?? '' }}" class="form-input" placeholder="Ibu...">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h4 class="text-pink-600 dark:text-pink-400 font-bold mb-2">Mempelai Wanita</h4>
                            
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden border-2 border-pink-500">
                                    <img id="prev-bride" src="{{ isset($invitation->content['mempelai']['wanita']['foto']) ? asset($invitation->content['mempelai']['wanita']['foto']) : 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase text-gray-500 dark:text-gray-400 mb-1">Foto Wanita</label>
                                    <input type="file" name="bride_photo" onchange="previewImage(this, 'prev-bride')" class="text-xs text-gray-500 dark:text-gray-400">
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="bride_name" value="{{ $invitation->content['mempelai']['wanita']['nama'] ?? '' }}" class="form-input" placeholder="Nama Lengkap Wanita">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label">Panggilan</label>
                                    <input type="text" name="bride_nickname" value="{{ $invitation->content['mempelai']['wanita']['panggilan'] ?? '' }}" class="form-input" placeholder="Juliet">
                                </div>
                                <div>
                                    <label class="form-label">Instagram</label>
                                    <input type="text" name="bride_instagram" value="{{ $invitation->content['mempelai']['wanita']['instagram'] ?? '' }}" class="form-input" placeholder="juliet_ig">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" name="bride_father" value="{{ $invitation->content['mempelai']['wanita']['ayah'] ?? '' }}" class="form-input" placeholder="Bpk...">
                            </div>
                            <div>
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" name="bride_mother" value="{{ $invitation->content['mempelai']['wanita']['ibu'] ?? '' }}" class="form-input" placeholder="Ibu...">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="form-label">Quote Undangan</label>
                        <textarea name="quote" rows="2" class="form-input" placeholder="Tulis kata-kata mutiara...">{{ $invitation->content['quote'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-300 dark:border-gray-700 pb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">2. Rangkaian Acara</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h4 class="font-bold text-gray-700 dark:text-gray-300 border-l-4 border-indigo-500 pl-3">Acara 1 (Akad)</h4>
                            <div>
                                <label class="form-label">Judul Acara</label>
                                <input type="text" name="akad_title" value="{{ $invitation->content['acara']['akad']['judul'] ?? '' }}" class="form-input" placeholder="Akad Nikah">
                            </div>
                            <div>
                                <label class="form-label">Waktu</label>
                                <input type="datetime-local" name="akad_datetime" value="{{ isset($invitation->content['acara']['akad']['waktu']) ? \Carbon\Carbon::parse($invitation->content['acara']['akad']['waktu'])->format('Y-m-d\TH:i') : '' }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">Lokasi (Gedung/Rumah)</label>
                                <input type="text" name="akad_location" value="{{ $invitation->content['acara']['akad']['tempat'] ?? '' }}" class="form-input" placeholder="Masjid Agung">
                            </div>
                            <div>
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="akad_address" rows="2" class="form-input">{{ $invitation->content['acara']['akad']['alamat'] ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="form-label">Link Maps</label>
                                <input type="text" name="akad_map_link" value="{{ $invitation->content['acara']['akad']['maps'] ?? '' }}" class="form-input" placeholder="https://maps...">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h4 class="font-bold text-gray-700 dark:text-gray-300 border-l-4 border-pink-500 pl-3">Acara 2 (Resepsi)</h4>
                            <div>
                                <label class="form-label">Judul Acara</label>
                                <input type="text" name="resepsi_title" value="{{ $invitation->content['acara']['resepsi']['judul'] ?? '' }}" class="form-input" placeholder="Resepsi">
                            </div>
                            <div>
                                <label class="form-label">Waktu</label>
                                <input type="datetime-local" name="resepsi_datetime" value="{{ isset($invitation->content['acara']['resepsi']['waktu']) ? \Carbon\Carbon::parse($invitation->content['acara']['resepsi']['waktu'])->format('Y-m-d\TH:i') : '' }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="resepsi_location" value="{{ $invitation->content['acara']['resepsi']['tempat'] ?? '' }}" class="form-input" placeholder="Hotel...">
                            </div>
                            <div>
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="resepsi_address" rows="2" class="form-input">{{ $invitation->content['acara']['resepsi']['alamat'] ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="form-label">Link Maps</label>
                                <input type="text" name="resepsi_map_link" value="{{ $invitation->content['acara']['resepsi']['maps'] ?? '' }}" class="form-input" placeholder="https://maps...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-300 dark:border-gray-700 pb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">3. Media & Galeri</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="form-label mb-2">Foto Cover</label>
                            <input type="file" name="cover_image" class="form-input bg-white dark:bg-gray-800 pt-2">
                            @if(isset($invitation->content['media']['cover']))
                                <p class="text-xs text-green-600 mt-1">Cover sudah ada.</p>
                            @endif
                        </div>
                        <div>
                            <label class="form-label mb-2">Musik (.mp3)</label>
                            <input type="file" name="music_file" accept=".mp3" class="form-input bg-white dark:bg-gray-800 pt-2">
                        </div>
                        <div>
                            <label class="form-label">Link Youtube Embed</label>
                            <input type="text" name="video_link" value="{{ $invitation->content['media']['video_link'] ?? '' }}" class="form-input" placeholder="https://www.youtube.com/embed/...">
                        </div>
                        <div>
                            <label class="form-label mb-2">Galeri Foto (Banyak)</label>
                            <input type="file" name="gallery_photos[]" multiple class="form-input bg-white dark:bg-gray-800 pt-2">
                        </div>
                    </div>
                    
                    @if(isset($invitation->content['media']['gallery']) && count($invitation->content['media']['gallery']) > 0)
                        <div class="grid grid-cols-4 md:grid-cols-6 gap-2 mt-4">
                            @foreach($invitation->content['media']['gallery'] as $photo)
                                <img src="{{ asset($photo) }}" class="h-20 w-full object-cover rounded-lg border border-gray-300 dark:border-gray-700">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-300 dark:border-gray-700 pb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">4. Love Story</h3>
                    </div>

                    @php 
                        $stories = $invitation->content['love_stories'] ?? []; 
                        for($i=count($stories); $i<3; $i++) {
                            $stories[] = ['year' => '', 'title' => '', 'story' => '', 'image' => null];
                        }
                    @endphp

                    @foreach ($stories as $index => $story)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="md:col-span-2">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="love_stories[{{ $index }}][year]" value="{{ $story['year'] ?? '' }}" class="form-input" placeholder="2020">
                        </div>
                        <div class="md:col-span-4">
                            <label class="form-label">Judul</label>
                            <input type="text" name="love_stories[{{ $index }}][title]" value="{{ $story['title'] ?? '' }}" class="form-input" placeholder="Pertama Bertemu">
                        </div>
                        <div class="md:col-span-6">
                            <label class="form-label">Cerita</label>
                            <textarea name="love_stories[{{ $index }}][story]" rows="1" class="form-input" placeholder="Cerita singkat...">{{ $story['story'] ?? '' }}</textarea>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-300 dark:border-gray-700 pb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">5. Amplop Digital</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="form-label">Bank / E-Wallet</label>
                            <input type="text" name="bank_name" value="{{ $invitation->content['amplop']['bank_name'] ?? '' }}" class="form-input" placeholder="BCA">
                        </div>
                        <div>
                            <label class="form-label">No Rekening</label>
                            <input type="text" name="bank_number" value="{{ $invitation->content['amplop']['account_number'] ?? '' }}" class="form-input" placeholder="123456">
                        </div>
                        <div>
                            <label class="form-label">Atas Nama</label>
                            <input type="text" name="bank_holder" value="{{ $invitation->content['amplop']['account_holder'] ?? '' }}" class="form-input" placeholder="Nama Pemilik">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Alamat Kirim Kado</label>
                            <textarea name="gift_address" rows="2" class="form-input" placeholder="Jalan...">{{ $invitation->content['amplop']['alamat_kado'] ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="form-label">Link Maps</label>
                            <input type="text" name="gift_map_link" value="{{ $invitation->content['amplop']['maps_kado'] ?? '' }}" class="form-input" placeholder="https://maps...">
                        </div>
                    </div>
                </div>

                <div class="fixed bottom-0 left-0 right-0 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 p-4 z-50">
                    <div class="max-w-5xl mx-auto flex justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-10 rounded-full shadow-lg transition-transform transform hover:-translate-y-1 w-full md:w-auto">
                            Simpan Data
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <style>
        /* Paksa warna label agar terlihat di dark/light mode */
        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
            color: #4b5563; /* Gray-600 */
        }
        .dark .form-label {
            color: #d1d5db !important; /* Gray-300 (Visible in Dark Mode) */
        }

        /* Paksa Input Style agar kontras */
        .form-input {
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db; /* Gray-300 */
            background-color: #ffffff !important; /* White BG */
            color: #111827 !important; /* Black Text */
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
        }
        
        /* Dark Mode Override untuk Input */
        .dark .form-input {
            background-color: #1f2937 !important; /* Gray-800 */
            border-color: #374151 !important; /* Gray-700 */
            color: #ffffff !important; /* White Text (PASTI TERLIHAT) */
        }

        .dark .form-input::placeholder {
            color: #9ca3af !important; /* Gray-400 */
        }
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