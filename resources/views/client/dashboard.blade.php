<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mempelai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="font-bold text-xl text-indigo-600">Undangan Digital</div>
        <div class="flex items-center gap-4">
            <a href="{{ route('client.settings') }}" class="text-sm text-indigo-600 font-bold hover:underline mr-4">Edit Undangan</a>
            <span class="text-sm text-gray-500">Halo, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 font-bold hover:underline">Logout</button>
            </form>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6 md:p-10">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Mempelai</h1>
            <p class="text-gray-500">Pantau kehadiran tamu undanganmu di sini.</p>
            
            <div class="mt-4 bg-indigo-50 border border-indigo-200 p-4 rounded-lg flex justify-between items-center">
                <div>
                    <span class="text-xs font-bold text-indigo-500 uppercase">Link Undangan Publik:</span>
                    <div class="text-indigo-700 font-medium select-all">
                        {{ url('undangan/' . $invitation->slug) }}
                    </div>
                </div>
                <a href="{{ url('undangan/' . $invitation->slug) }}" target="_blank" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-700">
                    Buka Undangan &rarr;
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-xs font-bold uppercase">Total Tamu</div>
                <div class="text-3xl font-bold text-gray-800">{{ $totalGuests }}</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-green-500 text-xs font-bold uppercase">Akan Hadir</div>
                <div class="text-3xl font-bold text-green-600">{{ $hadir }}</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-red-500 text-xs font-bold uppercase">Berhalangan</div>
                <div class="text-3xl font-bold text-red-600">{{ $tidakHadir }}</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-yellow-500 text-xs font-bold uppercase">Belum Respon</div>
                <div class="text-3xl font-bold text-yellow-600">{{ $pending }}</div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <h3 class="font-bold text-gray-800">Buku Tamu</h3>

                <div class="flex items-center gap-3">
                    <a href="{{ route('client.downloadTemplate') }}" class="text-indigo-600 text-sm font-bold hover:underline flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download Template
                    </a>

                    <form action="{{ route('client.importGuests') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
                        @csrf
                        <input type="file" name="file_excel" class="w-48 text-xs text-gray-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                        <button type="submit" class="bg-green-600 text-white px-3 py-2 rounded-lg text-sm font-bold hover:bg-green-700 shadow">
                            Upload
                        </button>
                    </form>
                </div>
            </div>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tamu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link Khusus</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RSVP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ucapan</th> </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($guests as $guest)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $guest->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <span class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $guest->category }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <div class="flex items-center gap-2">
                                <input type="text" readonly value="{{ url('undangan/' . $invitation->slug . '?to=' . $guest->slug) }}" class="bg-gray-50 border px-2 py-1 rounded w-40 text-xs text-gray-600 focus:outline-none select-all">
                                <a href="https://wa.me/{{ $guest->phone_number }}?text=Halo%20{{ $guest->name }},%20kami%20mengundangmu%20ke%20pernikahan%20kami.%20Cek%20link:%20{{ urlencode(url('undangan/' . $invitation->slug . '?to=' . $guest->slug)) }}" target="_blank" class="text-green-500 hover:text-green-700" title="Kirim WA">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($guest->rsvp_status == 'hadir')
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Hadir</span>
                            @elseif($guest->rsvp_status == 'tidak_hadir')
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-bold">Tidak</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full font-bold">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 italic max-w-xs truncate">
                            "{{ $guest->comment ?? '-' }}"
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            Belum ada data tamu. Silakan upload Excel.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>