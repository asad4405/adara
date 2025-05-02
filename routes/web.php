<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/product/{slug}',[FrontendController::class,'product_details'])->name('product.details');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/contact/submit',[FrontendController::class,'contact_submit'])->name('contact.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__ . '/admin.php';
