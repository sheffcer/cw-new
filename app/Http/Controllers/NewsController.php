<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        $locale = App::getLocale(); // Получаем текущий язык

        $newsItems = News::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])
        ->orderBy('date', 'desc')
        ->get()
        ->map(function ($item) use ($locale) {
            $translation = $item->translation($locale);

            return [
                'id' => $item->id,
                'title' => $translation ? $translation->title : '',
                'description' => $translation ? $translation->description : '',
                'content' => $translation ? ($translation->content ?? $translation->description) : '',
                'image' => [
                    'default' => $item->image_default,
                    'mobile' => $item->image_mobile,
                    'tablet' => $item->image_tablet,
                ],
                'created_at' => $item->date,
                'isNew' => $item->is_new,
            ];
        });

        return Inertia::render('News', [
            'newsItems' => $newsItems
        ]);
    }

    public function show($id)
    {
        $locale = App::getLocale(); // Получаем текущий язык

        $newsItem = News::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->findOrFail($id);

        $translation = $newsItem->translation($locale);

        $formattedNews = [
            'id' => $newsItem->id,
            'title' => $translation ? $translation->title : '',
            'description' => $translation ? $translation->description : '',
            'content' => $translation ? ($translation->content ?? $translation->description) : '',
            'image' => [
                'default' => $newsItem->image_default,
                'mobile' => $newsItem->image_mobile,
                'tablet' => $newsItem->image_tablet,
            ],
            'created_at' => $newsItem->date,
            'isNew' => $newsItem->is_new,
        ];

        $relatedNews = News::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])
        ->where('id', '!=', $id)
        ->orderBy('date', 'desc')
        ->limit(3)
        ->get()
        ->map(function ($item) use ($locale) {
            $translation = $item->translation($locale);

            return [
                'id' => $item->id,
                'title' => $translation ? $translation->title : '',
                'content' => $translation ? ($translation->content ?? $translation->description) : '',
                'image' => [
                    'default' => $item->image_default,
                    'mobile' => $item->image_mobile,
                    'tablet' => $item->image_tablet,
                ],
                'link' => "/news/{$item->id}",
            ];
        });

        return Inertia::render('NewsDetail', [
            'newsItem' => $formattedNews,
            'relatedNews' => $relatedNews
        ]);
    }
}
