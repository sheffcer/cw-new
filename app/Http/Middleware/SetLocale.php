<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, есть ли локаль в сессии
        if (session()->has('locale')) {
            $locale = session()->get('locale');
            App::setLocale($locale);

            // Логируем для отладки
            \Log::info("Middleware set locale to: " . $locale);
            \Log::info("App locale is now: " . App::getLocale());
        }

        return $next($request);
    }
}

