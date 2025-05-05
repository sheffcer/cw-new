<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\NewsController; // Добавляем импорт контроллера

//Route::get('language/{locale}', [LanguageController::class, 'switchLanguage'])->name('language.switch');

Route::get('/locale/{locale}', [App\Http\Controllers\LanguageController::class, 'switchLanguage'])
    ->name('locale.switch');

Route::post('/locale/{locale}', [LanguageController::class, 'switchLanguage'])
    ->name('locale.switch')
    ->middleware('web');


Route::post('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['uk', 'ru', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('set.locale');


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/main', function () {
    return Inertia::render('Main');
});


// Группировка маршрутов для новостей
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
