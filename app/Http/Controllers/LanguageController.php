<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request, $locale)
    {
        // Проверяем, является ли язык поддерживаемым
        if (in_array($locale, ['en', 'ru', 'uk'])) {
            // Сохраняем выбранный язык в сессии
            $request->session()->put('locale', $locale);
        }

        // Перенаправляем на предыдущую страницу
        return redirect()->back();
    }
}
