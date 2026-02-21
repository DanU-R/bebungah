<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitation;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        // Eager load 'user' pada kedua query untuk menghindari N+1 query
        $pendingOrders = Invitation::where('status', 'pending')
            ->with('user', 'theme')
            ->latest()
            ->paginate(20, pageName: 'pending_page');

        $activeOrders = Invitation::where('status', 'active')
            ->with('user', 'theme')
            ->latest()
            ->paginate(20, pageName: 'active_page');

        return view('admin.dashboard', compact('pendingOrders', 'activeOrders'));
    }

    public function approve($id)
    {
        $invitation = Invitation::with('user')->findOrFail($id);

        if ($invitation->status === 'active') {
            return redirect()->back()->with('error', 'Pesanan ini sudah aktif sebelumnya!');
        }

        $credentials = [];

        try {
            DB::transaction(function () use ($invitation, &$credentials) {

                $content  = $invitation->content;
                $namaPria = $content['mempelai']['pria']['nama'] ?? 'Mempelai Pria';
                $namaWanita = $content['mempelai']['wanita']['nama'] ?? 'Mempelai Wanita';

                $namaAkun = $namaPria . ' & ' . $namaWanita;

                $pria   = strtolower(preg_replace('/[^a-z0-9]/i', '', explode(' ', trim($namaPria))[0]));
                $wanita = strtolower(preg_replace('/[^a-z0-9]/i', '', explode(' ', trim($namaWanita))[0]));

                $baseEmail = "{$pria}.{$wanita}";
                $email     = $baseEmail . '@temanten.inv';

                $counter = 1;
                while (User::where('email', $email)->exists()) {
                    $email = $baseEmail . $counter . '@temanten.inv';
                    $counter++;
                }

                $rawPassword = Str::random(8);

                $user = User::create([
                    'name'     => $namaAkun,
                    'email'    => $email,
                    'password' => Hash::make($rawPassword),
                    'role'     => 'client',
                ]);

                $invitation->update([
                    'status'  => 'active',
                    'user_id' => $user->id,
                ]);

                $credentials = [
                    'name'     => $namaAkun,
                    'email'    => $email,
                    'password' => $rawPassword,
                ];
            });

            // Log aktivitas admin: persetujuan undangan
            ActivityLog::record('admin_action', 'invitation.approved', $invitation, [
                'invitation_slug' => $invitation->slug,
                'approved_by'     => auth()->user()->email,
            ]);

            Log::channel('daily')->info('Admin approved invitation', [
                'admin'           => auth()->user()->email,
                'invitation_id'   => $invitation->id,
                'invitation_slug' => $invitation->slug,
            ]);

            return redirect()->back()->with('new_account', $credentials);

        } catch (\Exception $e) {

            Log::channel('daily')->error('Failed to approve invitation', [
                'admin'         => auth()->user()->email,
                'invitation_id' => $id,
                'error'         => $e->getMessage(),
                'trace'         => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    public function resetPassword($user_id)
    {
        $user = User::findOrFail($user_id);

        $newPassword = Str::random(8);

        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        // Log aktivitas admin: reset password klien
        ActivityLog::record('admin_action', 'user.password_reset', $user, [
            'target_email'  => $user->email,
            'reset_by'      => auth()->user()->email,
        ]);

        Log::channel('daily')->info('Admin reset client password', [
            'admin'        => auth()->user()->email,
            'target_user'  => $user->email,
        ]);

        return redirect()->back()->with('reset_success', [
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $newPassword,
        ]);
    }
}