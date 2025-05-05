<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request, $locale)
    {
        // Проверяем, является ли язык поддерживаемым
        if (in_array($locale, ['en', 'ru', 'uk'])) {
            // Сохраняем выбранный язык в сессии
            $request->session()->put('locale', $locale);

            // Устанавливаем локаль приложения явно
            App::setLocale($locale);

            // Очищаем кэш переводов для обеспечения корректной загрузки
            app('translator')->setLoaded([]);

            // Очищаем кэш Inertia props
            $request->session()->forget('_inertia_page_props');

            // Для отладки
            \Log::info("Язык изменен на: " . $locale);
            \Log::info("App::getLocale(): " . App::getLocale());
            \Log::info("Session: " . $request->session()->get('locale'));
        }

        // Перенаправляем на предыдущую страницу
        return redirect()->back();
    }
}
