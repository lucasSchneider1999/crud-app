<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

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
        $this->mapWebRoutes();
        Schema::defaultStringLength(length: 191);
    }
    protected function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace('App\Http\Controllers')
        ->group(base_path('routes/web.php'));
    }
    
}