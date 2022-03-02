<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blog_repository;

    public function __construct(BlogRepository $book_repository)
    {
        $this->book_repository = $book_repository;
    }
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('blogs.index')
            ->with(['blogs' => $blogs]);
    }

    public function show(Blog $blog)
     {
        return view('blogs.show')
            ->with(['blog' => $blog]);
    }
}
