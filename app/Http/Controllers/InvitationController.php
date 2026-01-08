<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Guest;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function show($slug, Request $request)
    {
        // 1. Ambil Data Undangan
        $invitation = Invitation::where('slug', $slug)->where('status', 'active')->firstOrFail();
        
        // 2. Cek Tamu Spesifik (?to=...)
        $guest = null;
        if ($request->has('to')) {
            $guest = Guest::where('slug', $request->query('to'))->first();
        }

        // 3. AMBIL DATA UCAPAN (Ini yang kemarin mungkin ketinggalan)
        // Kita ambil semua tamu yang kolom 'comment'-nya TIDAK KOSONG
        $comments = $invitation->guests()
                    ->whereNotNull('comment')
                    ->where('comment', '!=', '')
                    ->orderBy('updated_at', 'desc') // Yang terbaru di atas
                    ->get();

        // 4. Tampilkan View
        $viewPath = $invitation->theme->view_path;
        return view($viewPath, compact('invitation', 'guest', 'comments'));
    }

    public function submitRSVP(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->update([
            'rsvp_status' => $request->rsvp_status,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Konfirmasi Anda telah tersimpan. Terima kasih atas doanya!');
    }
}