<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('date', 'desc')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'content' => $item->content ?? $item->description, // из description, если content пустой
                'image' => [
                    'default' => $item->image_default,
                    'mobile' => $item->image_mobile,
                    'tablet' => $item->image_tablet,
                ],
                'created_at' => $item->date, // предоставляем исходную дату без форматирования
            ];
        });


        return Inertia::render('News', [
            'newsItems' => $newsItems
        ]);
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $formattedNews = [
            'id' => $newsItem->id,
            'title' => $newsItem->title,
            'content' => $newsItem->content ?? $newsItem->description,
            'image' => [
                'default' => $newsItem->image_default,
                'mobile' => $newsItem->image_mobile,
                'tablet' => $newsItem->image_tablet,
            ],
            'created_at' => $newsItem->date,
        ];

        $relatedNews = News::where('id', '!=', $id)
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'content' => $item->content ?? $item->description,
                    'image' => [
                        'default' => $item->image_default,
                        'mobile' => $item->image_mobile,
                        'tablet' => $item->image_tablet,
                    ],
                    'link' => "/news/{$item->id}", // обязательно для RelatedNews интерфейса
                ];
            });

    }
}
