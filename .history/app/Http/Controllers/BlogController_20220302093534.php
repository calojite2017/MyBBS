<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $book_repository;
    protected $review_repository;

    public function __construct(BookRepository $book_repository, ReviewRepository $review_repository)
    {
        $this->book_repository = $book_repository;
        $this->review_repository = $review_repository;

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
