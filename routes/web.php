<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvitationController;

// ====================================================
// 1. ROUTE KHUSUS GAMBAR (SOLUSI ANTI ERROR 404)
// ====================================================
Route::get('/storage/invitations/{uuid}/{filename}', function ($uuid, $filename) {
    $path = "public/invitations/{$uuid}/{$filename}";

    if (!Storage::exists($path)) {
        abort(404);
    }

    $file = Storage::get($path);
    $type = Storage::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage.images');


// =====================
// 2. HALAMAN DEPAN
// =====================
Route::get('/', function () {
    return view('landing');
})->name('home');

// Theme Catalog
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes/{slug}', [ThemeController::class, 'show'])->name('themes.show');


// =====================
// 3. PUBLIC ROUTES (Order & Undangan)
// =====================
Route::get('/buat-undangan', [OrderController::class, 'create'])->name('order.create');
Route::post('/buat-undangan', [OrderController::class, 'store'])->name('order.store');
Route::get('/pembayaran', [OrderController::class, 'payment'])->name('order.payment');
Route::get('/order-success/{id}', [OrderController::class, 'success'])->name('order.success');

// Demo & Lihat Undangan
Route::get('/demo/{theme}', [InvitationController::class, 'demo'])->name('demo.show');
Route::get('/undangan/{slug}', [InvitationController::class, 'show'])->name('invitation.show');

// Fitur Undangan — Rate limit: maks 10 ucapan per menit per IP, mencegah spam
Route::middleware('throttle:10,1')->group(function () {
    Route::post('/kirim-ucapan', [InvitationController::class, 'kirimUcapan'])->name('kirim.ucapan');
    Route::post('/rsvp/{id}', [InvitationController::class, 'submitRSVP'])->name('invitation.rsvp');
});


// =====================
// 4. AUTH & REDIRECT
// =====================
require __DIR__ . '/auth.php';

// Redirect Dashboard (Cek Role: Admin atau Client)
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('client.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// =====================
// 5. ADMIN ROUTES
// =====================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/reset-password/{user_id}', [AdminController::class, 'resetPassword'])->name('admin.resetPassword');

    // Theme Management
    Route::get('/themes', [AdminController::class, 'themes'])->name('admin.themes');
    Route::post('/themes/{id}/price', [AdminController::class, 'updateThemePrice'])->name('admin.themes.price');
    Route::post('/themes/default-price', [AdminController::class, 'updateDefaultPrice'])->name('admin.themes.defaultPrice');
});


// =====================
// 6. CLIENT ROUTES
// =====================
Route::middleware(['auth'])->prefix('client')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');

    // Fitur Tamu (Import/Export)
    Route::post('/import-guests', [ClientController::class, 'importGuests'])->name('client.importGuests');
    Route::get('/download-template', [ClientController::class, 'downloadTemplate'])->name('client.downloadTemplate');
    Route::get('/export-guests/{invitation}', [ClientController::class, 'exportGuests'])->name('client.exportGuests');

    // Fitur Tamu (Input Manual)
    Route::post('/store-guest', [ClientController::class, 'storeGuest'])->name('client.storeGuest');
    Route::delete('/delete-guest/{guest}', [ClientController::class, 'deleteGuest'])->name('client.deleteGuest');

    // Edit Undangan (Settings)
    Route::get('/settings', [ClientController::class, 'settings'])->name('client.settings');
    Route::put('/settings', [ClientController::class, 'updateSettings'])->name('client.updateSettings');
});

// CATATAN: Route /debug-session telah dihapus karena berbahaya di production.
// Gunakan 'php artisan tinker' atau Laravel Telescope untuk debugging.
