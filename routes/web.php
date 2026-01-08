<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvitationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =====================
// 1. HALAMAN DEPAN
// =====================
Route::get('/', function () {
    return view('landing');
});

// =====================
// 2. PUBLIC ROUTES
// =====================
Route::get('/buat-undangan', [OrderController::class, 'create'])->name('order.create');
Route::post('/buat-undangan', [OrderController::class, 'store'])->name('order.store');
Route::get('/order-success/{id}', [OrderController::class, 'success'])->name('order.success');

Route::get('/undangan/{slug}', [InvitationController::class, 'show'])->name('invitation.show');
Route::post('/rsvp/{id}', [InvitationController::class, 'submitRSVP'])->name('invitation.rsvp');

// =====================
// 3. ADMIN ROUTES (WAJIB AUTH)
// =====================
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::post('/approve/{id}', [AdminController::class, 'approve'])
        ->name('admin.approve');

    Route::post('/reset-password/{user_id}', [AdminController::class, 'resetPassword'])
        ->name('admin.resetPassword');
});

// =====================
// 4. DASHBOARD REDIRECT SETELAH LOGIN
// =====================
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('client.dashboard');

})->middleware('auth')->name('dashboard');

// =====================
// 5. CLIENT ROUTES
// =====================
Route::middleware(['auth'])->prefix('client')->group(function () {

    Route::get('/dashboard', [ClientController::class, 'index'])
        ->name('client.dashboard');

    Route::post('/import-guests', [ClientController::class, 'importGuests'])
        ->name('client.importGuests');

    Route::get('/download-template', [ClientController::class, 'downloadTemplate'])
        ->name('client.downloadTemplate');

    Route::get('/settings', [ClientController::class, 'settings'])
        ->name('client.settings');

    Route::put('/settings', [ClientController::class, 'updateSettings'])
        ->name('client.updateSettings');
});

// =====================
// 6. AUTH ROUTES (BREEZE)
// =====================
require __DIR__ . '/auth.php';
