<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;

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
        }

        // Вернем успешный ответ для Inertia
        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'locale' => $locale]);
        }

        // Для Inertia вернем редирект обратно, но с обновленными данными
        return back();
    }
}
