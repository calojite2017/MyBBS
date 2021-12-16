<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class TopPageServer extends Controller
{
    public function index()
    {
        // $news = News::all();
        $news = $this->NewsList(limit: 4);
        $params = [
            'news_list' => $news,
        ];
        // dd($params);
        return view('index', $params);
    }

    private function NewsList($limit)
    {
        $query = News::select(
            'news_no',
            'title',
            'image',
            'content',
            'created_at',
            'updated_at',
        );

        // return $query->orderBy('created_at', 'desc')->take($limit)->get();
        return $query->take($limit)->get();
    }
}
