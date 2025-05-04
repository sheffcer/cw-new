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
                'description' => $item->description,
                'date' => date('d.m.Y', strtotime($item->date)),
                'isNew' => $item->is_new,
                'image' => [
                    'default' => $item->image_default,
                    'mobile' => $item->image_mobile,
                    'tablet' => $item->image_tablet,
                ],
                'content' => $item->content,
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
            'newsItem' => $formattedNews
        ]);
    }
}
