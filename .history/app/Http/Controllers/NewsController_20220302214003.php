<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $news_repository;

    public function __construct(NewsRepository $news_repository)
    {
        $this->news_repository = $news_repository;
    }

    public function detail($news_no)
    {
        $news_list = $this->news_repository->getNewsList(limit: 6);
        $news = $this->news_repository->getNewsDetail($news_no);
        if(is_null($news)){
            abort(404);
        }
        // dd($news);
        return view('news.detail', ['news' => $news, 'news_list' => $news_list]);
    }
}
