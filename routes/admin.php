<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildcategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CreatePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\Backend\OrderStatusController;
use App\Http\Controllers\Backend\PixelController;
use App\Http\Controllers\Backend\ShippingChargeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

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

    // colors
    Route::resource('color', ColorController::class, ['names' => 'admin.color']);
    Route::get('color/get/data', [ColorController::class, 'getData'])->name('admin.color.get-data');
    Route::get('color/status/{id}', [ColorController::class, 'statusUpdate']);

    // sizes
    Route::resource('size', SizeController::class, ['names' => 'admin.size']);
    Route::get('size/get/data', [SizeController::class, 'getData'])->name('admin.size.get-data');
    Route::get('size/status/{id}', [SizeController::class, 'statusUpdate']);

    // general setting
    Route::resource('general/setting', GeneralSettingController::class, ['names' => 'admin.generalSetting']);
    Route::get('general/setting/get/data', [GeneralSettingController::class, 'getData'])->name('admin.generalSetting.get-data');

    // pixel setting
    Route::resource('pixel/setting', PixelController::class, ['names' => 'admin.pixelSetting']);
    Route::get('pixel/setting/get/data', [PixelController::class, 'getData'])->name('admin.pixelSetting.get-data');
    Route::get('pixel/setting/status/{id}', [PixelController::class, 'statusUpdate']);

    // social media
    Route::resource('social-media', SocialMediaController::class, ['names' => 'admin.social-media']);
    Route::get('social-media/get/data', [SocialMediaController::class, 'getData'])->name('admin.social-media.get-data');
    Route::get('social-media/status/{id}', [SocialMediaController::class, 'statusUpdate']);

    // contact us
    Route::resource('contact-us', ContactController::class, ['names' => 'admin.contact-us']);
    Route::get('contact-us/get/data', [ContactController::class, 'getData'])->name('admin.contact-us.get-data');

    // create page
    Route::resource('create-page', CreatePageController::class, ['names' => 'admin.create-page']);
    Route::get('create-page/get/data', [CreatePageController::class, 'getData'])->name('admin.create-page.get-data');
    Route::get('create-page/status/{id}', [CreatePageController::class, 'statusUpdate']);

    // shipping charge
    Route::resource('shipping-charge', ShippingChargeController::class, ['names' => 'admin.shipping-charge']);
    Route::get('shipping-charge/get/data', [ShippingChargeController::class, 'getData'])->name('admin.shipping-charge.get-data');
    Route::get('shipping-charge/status/{id}', [ShippingChargeController::class, 'statusUpdate']);

    // order status
    Route::resource('order/status', OrderStatusController::class, ['names' => 'admin.order-status']);
    Route::get('order/status/get/data', [OrderStatusController::class, 'getData'])->name('admin.order-status.get-data');
});
