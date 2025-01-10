<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('chat', 'chat')
    ->middleware(['auth'])
    ->name('chat');

Route::post('/user/theme', function(\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'theme' => 'required|in:dark,light,system',
    ]);
    session()->put('theme', $validated['theme']);

    return response()->json([
        'message' => 'Theme updated successfully.',
        'theme' => $validated['theme'],
    ], 200);
})->name('set-theme');

Route::prefix('chat')->group(function() {
    Route::get('/index', [ChatController::class, 'index']);
});

require __DIR__.'/auth.php';
