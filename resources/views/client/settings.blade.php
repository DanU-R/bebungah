<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Undangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans pb-20">

    <nav class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex justify-between items-center sticky top-0 z-50">
        <div class="font-bold text-xl text-indigo-600">Undangan Digital</div>
        <div class="flex gap-4">
            <a href="{{ route('client.dashboard') }}" class="text-gray-500 hover:text-indigo-600 font-medium">Dashboard</a>
            <span class="text-gray-300">|</span>
            <span class="text-indigo-600 font-bold">Edit Undangan</span>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto p-6 md:p-10">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Data Undangan</h1>
            <a href="{{ url('undangan/' . $invitation->slug) }}" target="_blank" class="text-indigo-600 hover:underline text-sm font-bold flex items-center gap-1">
                Lihat Hasil 
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <span class="text-xl">&times;</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('client.updateSettings') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Data Mempelai</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4 border p-4 rounded-lg bg-gray-50">
                        <h3 class="font-bold text-indigo-600 border-b pb-2">Mempelai Pria</h3>
                        
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden border-2 border-indigo-200 relative group shadow-sm">
                                <img id="preview-groom" 
                                     src="{{ isset($invitation->content['mempelai']['pria']['foto']) ? asset('storage/'.$invitation->content['mempelai']['pria']['foto']) : 'https://via.placeholder.com/150?text=Pria' }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Foto Pria</label>
                                <input type="file" name="groom_photo" onchange="previewImage(this, 'preview-groom')" class="text-xs w-full text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                            <input type="text" name="groom_name" value="{{ $invitation->content['mempelai']['pria']['nama'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Ayah</label>
                            <input type="text" name="groom_father" value="{{ $invitation->content['mempelai']['pria']['ayah'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Ibu</label>
                            <input type="text" name="groom_mother" value="{{ $invitation->content['mempelai']['pria']['ibu'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                        </div>
                    </div>

                    <div class="space-y-4 border p-4 rounded-lg bg-gray-50">
                        <h3 class="font-bold text-pink-600 border-b pb-2">Mempelai Wanita</h3>
                        
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden border-2 border-pink-200 relative shadow-sm">
                                <img id="preview-bride" 
                                     src="{{ isset($invitation->content['mempelai']['wanita']['foto']) ? asset('storage/'.$invitation->content['mempelai']['wanita']['foto']) : 'https://via.placeholder.com/150?text=Wanita' }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Foto Wanita</label>
                                <input type="file" name="bride_photo" onchange="previewImage(this, 'preview-bride')" class="text-xs w-full text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 cursor-pointer">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                            <input type="text" name="bride_name" value="{{ $invitation->content['mempelai']['wanita']['nama'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-pink-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Ayah</label>
                            <input type="text" name="bride_father" value="{{ $invitation->content['mempelai']['wanita']['ayah'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-pink-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Ibu</label>
                            <input type="text" name="bride_mother" value="{{ $invitation->content['mempelai']['wanita']['ibu'] }}" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-pink-200 outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Detail Acara & Media</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Tanggal Acara</label>
                        <input type="date" name="event_date" value="{{ $invitation->event_date->format('Y-m-d') }}" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">ID Video Youtube</label>
                        <input type="text" name="video_link" value="{{ $invitation->content['media']['video_link'] ?? '' }}" placeholder="Contoh: dQw4w9WgXcQ" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-100">
                        <p class="text-[10px] text-gray-400 mt-1">Hanya masukkan Kode ID (bukan link lengkap).</p>
                    </div>

                    <div class="md:col-span-2 border p-4 rounded-lg bg-green-50/50 border-green-100">
                        <label class="block text-xs font-bold text-green-700 uppercase mb-2">Musik Latar (MP3)</label>
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <input type="file" name="music_file" accept=".mp3" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200 cursor-pointer">
                                <p class="text-[10px] text-gray-400 mt-1">Maksimal ukuran file: 20MB.</p>
                            </div>
                            @if(isset($invitation->content['media']['music']))
                                <div class="text-xs bg-white px-3 py-1 rounded border border-green-200 text-green-700 flex items-center gap-1 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Sudah terupload</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link Google Maps</label>
                        <input type="text" name="google_maps_link" value="{{ $invitation->content['acara']['maps_link'] }}" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Alamat Lengkap</label>
                        <textarea name="location_address" rows="2" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-100">{{ $invitation->content['acara']['alamat'] }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-yellow-200 bg-yellow-50/30">
                <div class="flex items-center gap-2 mb-6 border-b border-yellow-200 pb-2">
                    <h2 class="text-xl font-bold text-gray-800">Amplop Digital</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Bank / E-Wallet</label>
                        <input type="text" name="bank_name" value="{{ $invitation->content['amplop']['bank_name'] ?? '' }}" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-yellow-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">No. Rekening</label>
                        <input type="number" name="account_number" value="{{ $invitation->content['amplop']['account_number'] ?? '' }}" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-yellow-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Atas Nama</label>
                        <input type="text" name="account_holder" value="{{ $invitation->content['amplop']['account_holder'] ?? '' }}" class="w-full border rounded-lg px-4 py-2 outline-none focus:ring-2 focus:ring-yellow-200">
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Foto Cover Utama</h2>
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden border shadow-sm">
                        <img id="preview-cover" 
                             src="{{ isset($invitation->content['media']['cover']) ? asset('storage/'.$invitation->content['media']['cover']) : 'https://via.placeholder.com/150?text=Cover' }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Upload Foto Baru</label>
                        <input type="file" name="cover_photo" onchange="previewImage(this, 'preview-cover')" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Kisah Cinta (Love Story)</h2>
                <p class="text-sm text-gray-500 mb-6">Ceritakan perjalanan cinta kalian. Kosongkan jika tidak ingin ditampilkan.</p>
                
                <div class="space-y-8">
                    @php
                        // Ambil data stories yang ada, atau array kosong jika belum ada
                        $stories = $invitation->content['love_stories'] ?? [];
                        // Kita sediakan 3 slot default
                        $slots = [0, 1, 2];
                    @endphp

                    @foreach($slots as $index)
                        @php 
                            $story = $stories[$index] ?? null; 
                        @endphp
                        
                        <div class="border border-indigo-100 bg-indigo-50/30 p-6 rounded-xl relative">
                            <span class="absolute top-0 left-0 bg-indigo-100 text-indigo-800 px-3 py-1 rounded-br-lg text-xs font-bold">
                                Cerita #{{ $index + 1 }}
                            </span>

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mt-4">
                                <div class="md:col-span-4">
                                    <div class="w-full h-32 bg-gray-200 rounded-lg overflow-hidden border mb-2">
                                        <img id="preview-story-{{ $index }}" 
                                             src="{{ isset($story['image']) ? asset('storage/'.$story['image']) : 'https://via.placeholder.com/300x200?text=Foto+Momen' }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <input type="file" name="stories[{{ $index }}][image]" onchange="previewImage(this, 'preview-story-{{ $index }}')" class="w-full text-xs text-gray-500">
                                    <input type="hidden" name="stories[{{ $index }}][old_image]" value="{{ $story['image'] ?? '' }}">
                                </div>

                                <div class="md:col-span-8 space-y-3">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Judul Momen</label>
                                            <input type="text" name="stories[{{ $index }}][title]" value="{{ $story['title'] ?? '' }}" placeholder="Contoh: Pertama Bertemu" class="w-full border rounded p-2 text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Tahun / Tanggal</label>
                                            <input type="text" name="stories[{{ $index }}][year]" value="{{ $story['year'] ?? '' }}" placeholder="Contoh: 2020" class="w-full border rounded p-2 text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Cerita Singkat</label>
                                        <textarea name="stories[{{ $index }}][content]" rows="3" class="w-full border rounded p-2 text-sm" placeholder="Ceritakan sedikit tentang momen ini...">{{ $story['content'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sticky bottom-4 z-40 text-right">
                <button type="submit" class="bg-indigo-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:bg-indigo-700 transition-all transform hover:scale-105 active:scale-95 border-2 border-transparent hover:border-indigo-400">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result; // Update source gambar
                }

                reader.readAsDataURL(file); // Baca file sebagai URL data
            }
        }
    </script>

</body>
</html>