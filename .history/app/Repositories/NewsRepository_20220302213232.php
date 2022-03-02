<?php

namespace App\Repositories;

use App\Models\News;
// use Illuminate\Support\Facades\DB;


class NewsRepository
{
    // public function getNewBlogs($limit=false)
    // {
    //     $blogs_query =  Blog::latest();

    //         return $blogs_query->paginate($limit);
    // }

    public function getNewsList($limit)
    {
        $query = News::select(
            'news_no',
            'title',
            'image',
            'content',
            'created_at',
            'updated_at',
        );
        return $query->take($limit)->get();
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
