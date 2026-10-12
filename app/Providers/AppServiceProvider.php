<?php

namespace App\Providers;

use App\Models\Inquiry;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        try {
            if (Schema::hasTable('settings')) {
                $siteSettings = Cache::remember('site_settings', 3600, function () {
                    return Setting::pluck('value', 'key')->toArray();
                });
                View::share('siteSettings', $siteSettings);
            }

            if (Schema::hasTable('inquiries')) {
                View::composer(['layouts.admin', 'admin.*'], function ($view) {
                    $unreadInquiriesCount = Inquiry::where('status', 'new')->count();
                    $view->with('unreadInquiriesCount', $unreadInquiriesCount);
                });
            }
        } catch (\Throwable $e) {
            // Fallback for migrations or initial setup
        }
    }
}
