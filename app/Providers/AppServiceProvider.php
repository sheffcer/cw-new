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
        Inertia::share([
            'locale' => function () {
                return app()->getLocale();
            },
            'translations' => function () {
                // Если у вас есть JSON-переводы, загрузите их для текущей локали
                $locale = app()->getLocale();
                $translations = [];

                // Получаем переводы из JSON-файлов
                $path = resource_path("lang/{$locale}.json");
                if (file_exists($path)) {
                    $translations = json_decode(file_get_contents($path), true);
                }

                return $translations;
            },
            // Другие данные
        ]);
    }
}
