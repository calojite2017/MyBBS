<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        '2021.10.3 post',
        '2021.10.4 post',
        '2021.10.5 post',
    ];

    public function index()
    {
        return view('posts.index')
            ->with(['posts' => $this->posts]);
    }

    public function show($id)
     {
        return view('posts.show')
            ->with(['post' => $this->posts[$id]]);
    }
}
