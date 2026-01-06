<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Tambahkan ini agar tidak error

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
        // Paksa semua link/form menggunakan HTTPS jika di lingkungan production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
