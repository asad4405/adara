<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // categories
    Route::group(['prefix' => '/category'], function () {
        Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/get/data', [CategoryController::class, 'getData'])->name('category.get-data');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/status/{id}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('/front/view/{id}', [CategoryController::class, 'frontView'])->name('category.frontview');
    });
});
