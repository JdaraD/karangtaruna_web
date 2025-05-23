<?php

namespace App\Providers;

use App\Models\tentangKami;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.layouts.app', function ($view) {
            $tentangkami = tentangKami::where('is_active', 1)->get();
            $view->with('tentangkami', $tentangkami);
        });

    }
}
