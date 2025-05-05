<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $generalsetting = GeneralSetting::where('status', 1)->limit(1)->first();
        view()->share('generalsetting', $generalsetting);

        $contact = Contact::where('status', 1)->first();
        view()->share('contact', $contact);

        $social_media = SocialMedia::where('status', 1)->get();
        view()->share('social_media', $social_media);

        $categories = Category::where('status', 1)->latest()->get();
        view()->share('categories', $categories);
    }
}
