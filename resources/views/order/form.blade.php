<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Undangan Digital - Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-4xl mx-auto py-10 px-4">
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Buat Undangan Digital</h1>
            <p class="text-gray-500">Lengkapi data di bawah untuk memulai pesanan Anda.</p>
        </div>

        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl overflow-hidden">
            @csrf

            <div class="p-8 border-b border-gray-100">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">1. Pilih Tema Eksklusif</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($themes as $theme)
                    <div class="relative group">
                        <input type="radio" name="theme_id" id="theme_{{ $theme->id }}" value="{{ $theme->id }}" class="peer hidden" required>
                        <label for="theme_{{ $theme->id }}" class="block border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-indigo-600 peer-checked:bg-indigo-50 p-4 transition-all hover:border-indigo-300">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="font-bold text-lg">{{ $theme->name }}</h3>
                                <a href="{{ url('/preview/'.$theme->slug) }}" target="_blank" class="text-xs text-indigo-600 font-semibold underline hover:text-indigo-800 z-10">
                                    Lihat Preview &nearr;
                                </a>
                            </div>
                            <div class="h-32 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                @if($theme->thumbnail)
                                    <img src="{{ asset('storage/'.$theme->thumbnail) }}" class="h-full w-full object-cover rounded-lg">
                                @else
                                    <span>Thumbnail Tema</span>
                                @endif
                            </div>
                        </label>
                        <div class="absolute top-4 right-4 hidden peer-checked:block text-indigo-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    @endforeach
                </div>
                @error('theme_id') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="p-8 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">2. Data Akun & Link</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp (Aktif)</label>
                        <input type="number" name="client_whatsapp" value="{{ old('client_whatsapp') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="08123456789" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Link Undangan (Slug)</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                undangan.com/
                            </span>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="flex-1 px-4 py-2 border rounded-r-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="romeo-juliet" required>
                        </div>
                        @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="p-8 border-b border-gray-100">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">3. Detail Mempelai</h2>
                
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-indigo-600 mb-3 border-b pb-2">Mempelai Pria</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <input type="text" name="groom_name" value="{{ old('groom_name') }}" placeholder="Nama Lengkap Pria" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <input type="text" name="groom_father" value="{{ old('groom_father') }}" placeholder="Nama Ayah Pria" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                        <input type="text" name="groom_mother" value="{{ old('groom_mother') }}" placeholder="Nama Ibu Pria" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-pink-600 mb-3 border-b pb-2">Mempelai Wanita</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <input type="text" name="bride_name" value="{{ old('bride_name') }}" placeholder="Nama Lengkap Wanita" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-500" required>
                        </div>
                        <input type="text" name="bride_father" value="{{ old('bride_father') }}" placeholder="Nama Ayah Wanita" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-500" required>
                        <input type="text" name="bride_mother" value="{{ old('bride_mother') }}" placeholder="Nama Ibu Wanita" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-500" required>
                    </div>
                </div>
            </div>

            <div class="p-8 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Cerita Perjalanan Cinta (Opsional)</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tuliskan kisah singkat pertemuan hingga pelaminan</label>
                    <textarea name="story" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Kami bertemu tahun 2020 di kampus...">{{ old('story') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin ditampilkan.</p>
                </div>
            </div>

            <div class="p-8 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">4. Acara & Media</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Acara</label>
                        <input type="date" name="event_date" value="{{ old('event_date') }}" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi / Alamat</label>
                        <textarea name="location_address" class="w-full px-4 py-2 border rounded-lg" rows="1" required>{{ old('location_address') }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Cover (Utama)</label>
                        <input type="file" name="cover_photo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="text-xs text-gray-400 mt-1">Format: JPG/PNG. Max 2MB.</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Galeri Foto (Banyak)</label>
                        <input type="file" name="gallery_photos[]" accept="image/*" multiple class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
                        <p class="text-xs text-gray-400 mt-1">Bisa pilih lebih dari 1 foto.</p>
                    </div>
                </div>
            </div>

            <div class="p-8 text-right bg-gray-100">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all transform hover:scale-105">
                    Buat Undangan Sekarang &rarr;
                </button>
            </div>

        </form>
    </div>

</body>
</html>