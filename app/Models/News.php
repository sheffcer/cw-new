<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'is_new',
        'image_default',
        'image_mobile',
        'image_tablet',
    ];

    protected $casts = [
        'date' => 'date',
        'is_new' => 'boolean',
    ];

    /**
     * Получить все переводы новости
     */
    public function translations(): HasMany
    {
        return $this->hasMany(NewsTranslation::class);
    }

    /**
     * Получить перевод для конкретного языка
     */
    public function translation(string $locale = null)
    {
        if ($locale === null) {
            $locale = App::getLocale(); // Используем текущий язык
        }

        return $this->translations()->where('locale', $locale)->first();
    }

    /**
     * Получить заголовок на текущем языке
     */
    public function getTitle(string $locale = null): string
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->title : '';
    }

    /**
     * Получить описание на текущем языке
     */
    public function getDescription(string $locale = null): string
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->description : '';
    }

    /**
     * Получить контент на текущем языке
     */
    public function getContent(string $locale = null): ?string
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->content : null;
    }
}
