<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::post('/saran', [PublicController::class, 'store'])->middleware('auth')->name('saran.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {
    
    Route::get('/', function () {
        $totalSaran = \App\Models\Suggestion::count();
        $saranTampil = \App\Models\Suggestion::where('is_visible', true)->count();
        $saranBaru = \App\Models\Suggestion::where('created_at', '>=', now()->subDays(7))->count();

        return view('dashboard', compact('totalSaran', 'saranTampil', 'saranBaru'));
    })->name('dashboard');

    Route::name('dashboard.')->group(function () {
        Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestions.index');
        Route::put('/suggestions/{id}', [SuggestionController::class, 'update'])->name('suggestions.update');
        Route::delete('/suggestions/{id}', [SuggestionController::class, 'destroy'])->name('suggestions.destroy');
    });

});

require __DIR__.'/auth.php'; 