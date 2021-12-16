<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function detail($news_no)
    {
        $news = $this->getNewsDetail($news_no, news_limit: 4);
        if(is_null($news)){
            abort(404);
        }
        return view('news.detail', ['news' => $news]);
    }

    private function getNewsDetail($news_no)
    {
        return News::select(
            'news_no',
            'title',
            'image',
            'content',
            'created_at',
            'updated_at',
        )
            ->where('news_no', $news_no)
            ->first();
    }
}
