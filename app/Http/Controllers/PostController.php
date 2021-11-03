<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            '2021.10.3投稿',
            '2021.10.4投稿',
            '2021.10.5投稿',
        ];

        return view('index')
            ->with(['posts' => $posts]);
    }
}
