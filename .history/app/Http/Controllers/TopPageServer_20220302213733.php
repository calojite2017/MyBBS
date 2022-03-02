<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Repositories\PostRepository;

class TopPageServer extends Controller
{
    protected $post_repository;
    protected $news_repository;

    public function __construct(PostRepository $post_repository, NewsRepository $news_repository)
    {
        $this->post_repository = $post_repository;
        $this->news_repository = $post_repository;
    }

    public function index()
    {
        $posts = $this->post_repository->getNewPosts(limit: 8);

        $news = $this->NewsList(limit: 8);
        $params = [
            'news_list' => $news,
            'post_list' => $posts
        ];

        return view('index', $params);
    }

    // private function NewsList($limit)
    // {
    //     $query = News::select(
    //         'news_no',
    //         'title',
    //         'image',
    //         'content',
    //         'created_at',
    //         'updated_at',
    //     );

    //     // return $query->orderBy('created_at', 'desc')->take($limit)->get();
    //     return $query->take($limit)->get();
    // }
}
