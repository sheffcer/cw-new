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

        // Получаем 3 последние новости, исключая текущую новость
        $relatedNews = News::where('id', '!=', $id)
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description, // не используется в компоненте
                    'content' => $item->content,
                    'date' => date('d.m.Y', strtotime($item->date)), // не используется в компоненте
                    'isNew' => $item->is_new, // не используется в компоненте
                    'image' => [
                        'default' => $item->image_default,
                        'mobile' => $item->image_mobile,
                        'tablet' => $item->image_tablet,
                    ],
                    'link' => "/news/{$item->id}", // важно для RelatedNews интерфейса
                ];
            });


        $formattedNews = [
            'id' => $newsItem->id,
            'title' => $newsItem->title,
            'description' => $newsItem->description,
            'date' => date('d.m.Y', strtotime($newsItem->date)),
            'isNew' => $newsItem->is_new,
            'image' => [
                'default' => $newsItem->image_default,
                'mobile' => $newsItem->image_mobile,
                'tablet' => $newsItem->image_tablet,
            ],
            'content' => $newsItem->content,
        ];

        return Inertia::render('NewsDetail', [
            'newsItem' => $formattedNews,
            'relatedNews' => $relatedNews
        ]);
    }
}
