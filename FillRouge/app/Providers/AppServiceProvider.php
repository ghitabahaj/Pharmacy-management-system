<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicineRequest;

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
        Schema::defaultStringLength(191);
        View::composer('super.supersidebar', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $mypharmacy = $user->pharmacy;
                $unread_requests_count = $mypharmacy->medicineRequests()->where('is_read', false)->count();
                $view->with('unread_requests_count', $unread_requests_count);
            }
        });
    }
}
