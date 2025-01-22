<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', [ProductController::class, 'index'])->name('beranda');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/partner', function () {
    $user = Auth::user();

    return view('partner', [
        'nama' => $user->name,
        'email' => $user->email
    ]);
})->name('partner')->middleware('auth');

Route::post('/product/submit', [ProductController::class, 'submit'])->name('products.submit');
Route::get('/partner', [ProductController::class, 'show'])->name('partner')->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('detail');

require __DIR__.'/auth.php';
