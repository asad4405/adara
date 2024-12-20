<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildcategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // categories
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/get/data', [CategoryController::class, 'getData'])->name('category.get-data');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    Route::get('/category/front/view/{id}', [CategoryController::class, 'frontView'])->name('category.frontview');

    // Subcategories
    Route::resource('subcategory', SubcategoryController::class, ['names' => 'admin.subcategory']);
    Route::get('subcategory/get/data', [SubcategoryController::class, 'getData'])->name('admin.subcategory.get-data');
    Route::get('subcategory/status/{id}', [SubcategoryController::class, 'statusUpdate']);

    // childcategories
    Route::resource('childcategory', ChildcategoryController::class, ['names' => 'admin.childcategory']);
    Route::get('childcategory/get/data', [ChildcategoryController::class, 'getData'])->name('admin.childcategory.get-data');
    Route::get('childcategory/status/{id}', [ChildcategoryController::class, 'statusUpdate']);

    // brands
    Route::resource('brand', BrandController::class, ['names' => 'admin.brand']);
    Route::get('brand/get/data', [BrandController::class, 'getData'])->name('admin.brand.get-data');
    Route::get('brand/status/{id}', [BrandController::class, 'statusUpdate']);
});
