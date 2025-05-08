<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Mendefinisikan rute API jika diperlukan
        Route::prefix('api')
            ->middleware('api') // Menambahkan middleware 'api' untuk rute API
            ->group(base_path('routes/api.php')); // Mendefinisikan rute API dari file routes/api.php
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registrasi layanan aplikasi jika diperlukan
    }
}
