<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Repositories\PostRepository;
use App\Repositories\NewsRepository;

class TopPageServer extends Controller
{
    protected $post_repository;
    protected $news_repository;

    public function __construct(PostRepository $post_repository, NewsRepository $news_repository)
    {
        $this->post_repository = $post_repository;
        $this->news_repository = $news_repository;
    }

    public function index()
    {
        $posts = $this->post_repository->getNewPosts(limit: 8);

        $news = $this->news_repository->getNewsList(limit: 8);
        $params = [
            'news_list' => $news,
            'post_list' => $posts
        ];

        return view('index', $params);
    }

}
