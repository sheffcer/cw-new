<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        // Правильный способ регистрации динамических данных
        Inertia::share([
            'locale' => function () {
                return app()->getLocale();
            },
            // Другие данные могут быть добавлены здесь
            'app_name' => function() {
                return config('app.name');
            }
        ]);
    }
}
