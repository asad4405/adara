<?php

use App\Http\Controllers\Backend\BannerCategoryController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildcategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CourierApiController;
use App\Http\Controllers\Backend\CreatePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\Backend\GoogleTagManagerController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\Backend\MailGatewayController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderStatusController;
use App\Http\Controllers\Backend\PaymentGatewayController;
use App\Http\Controllers\Backend\PixelController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ShippingChargeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SmsGatewayController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // ================================ Product ======================================== //
    Route::resource('product', ProductController::class, ['names' => 'admin.product']);
    Route::get('product/get/data', [ProductController::class, 'getData'])->name('admin.product.get-data');
    Route::get('product/status/{id}', [ProductController::class, 'statusUpdate']);
    Route::get('products/price-edit', [ProductController::class, 'productPriceEdit'])->name('admin.product.price-edit');
    Route::post('products/price-update', [ProductController::class, 'productPriceUpdate'])->name('admin.product.price-update');

    // inventory
    Route::get('/inventory/{id}', [InventoryController::class, 'index'])->name('admin.inventory.index');
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('admin.inventory.store');
    Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('admin.inventory.edit');
    Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('admin.inventory.update');
    Route::get('/inventory/destroy/{id}', [InventoryController::class, 'destroy'])->name('admin.inventory.destroy');

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

    // coupons
    Route::resource('coupon', CouponController::class, ['names' => 'admin.coupon']);
    Route::get('coupon/get/data', [CouponController::class, 'getData'])->name('admin.coupon.get-data');
    Route::get('coupon/status/{id}', [CouponController::class, 'statusUpdate']);

    // ================================ order ========================================== //
    Route::get('order/{slug}', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('order/get/data/{slug}', [OrderController::class, 'getData'])->name('admin.order.get-data');

    Route::get('order/invoice/{id}', [OrderController::class, 'invoice'])->name('admin.order.invoice');
    Route::get('order/process/{id}', [OrderController::class, 'process'])->name('admin.order.process');
    Route::post('order/change/{id}', [OrderController::class, 'order_change'])->name('admin.order.change');
    Route::get('order/edit/{id}', [OrderController::class, 'order_edit'])->name('admin.order.edit');
    Route::post('order/update/{id}', [OrderController::class, 'order_update'])->name('admin.order.update');

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

    // GTM
    Route::resource('google/tag-manager', GoogleTagManagerController::class, ['names' => 'admin.google-tag-manager']);
    Route::get('google/tag-manager/get/data', [GoogleTagManagerController::class, 'getData'])->name('admin.google-tag-manager.get-data');
    Route::get('google/tag-manager/status/{id}', [GoogleTagManagerController::class, 'statusUpdate']);

    // banner and ads
    // banner category
    Route::resource('banner/category', BannerCategoryController::class, ['names' => 'admin.banner-category']);
    Route::get('banner/category/get/data', [BannerCategoryController::class, 'getData'])->name('admin.banner-category.get-data');
    Route::get('banner/category/status/{id}', [BannerCategoryController::class, 'statusUpdate']);

    // banner
    Route::resource('banner', BannerController::class, ['names' => 'admin.banner']);
    Route::get('banner/get/data', [BannerController::class, 'getData'])->name('admin.banner.get-data');
    Route::get('banner/status/{id}', [BannerController::class, 'statusUpdate']);


    // =============================== API Integration ============================ //
    // mail gateway
    Route::resource('mail/gateway', MailGatewayController::class, ['names' => 'admin.mail-gateway']);
    // sms gateway
    Route::resource('sms/gateway', SmsGatewayController::class, ['names' => 'admin.sms-gateway']);
    // payment gateway
    Route::resource('payment/gateway', PaymentGatewayController::class, ['names' => 'admin.payment-gateway']);
    // Courier
    Route::resource('courier/api', CourierApiController::class, ['names' => 'admin.courier-api']);

    // ================================= Review ======================================== //
    // review
    Route::resource('review', ReviewController::class, ['names' => 'admin.review']);
    Route::get('review/get/data', [ReviewController::class, 'getData'])->name('admin.review.get-data');
    Route::get('review/status/{id}', [ReviewController::class, 'statusUpdate']);

    // ================================== others ======================================== //
    Route::get('contact-us/list/index', [ContactUsController::class, 'contact_usList'])->name('admin.contact-us-list');
    Route::get('contact-us/list/index/get/data', [ContactUsController::class, 'getData'])->name('admin.contact-uus-list.get-data');
    Route::get('contact-us/list/index/show/data/{id}', [ContactUsController::class, 'showtData'])->name('admin.contact-us-list.show-data');
});
