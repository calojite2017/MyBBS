<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Blog;
use App\Repositories\BlogRepository;

class BlogController extends Controller
{
    protected $blog_repository;

    public function __construct(BlogRepository $blog_repository)
    {
        $this->blog_repository = $blog_repository;
    }

    public function index()
    {
        $blogs = $this->blog_repository->getNewBlogs(limit: 3);

        return view('blogs.index')
            ->with(['blogs' => $blogs]);
    }

    public function show(Blog $blog)
     {
        return view('blogs.show')
            ->with(['blog' => $blog]);
    }
}
