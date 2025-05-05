<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            $locale = session()->get('locale');
            app()->setLocale($locale);
            // Для отладки
            \Log::info("Установка локали: {$locale}");
        } else {
            \Log::info("Локаль не найдена в сессии");
        }
        return $next($request);
    }
}
