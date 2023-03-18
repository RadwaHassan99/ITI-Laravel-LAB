<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Button;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('button', Button::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Blade::component('button', Button::class);

    }
}
