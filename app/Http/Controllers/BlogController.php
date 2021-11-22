<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogs = [
        '2021.10.3 blog',
        '2021.10.4 blog',
        '2021.10.5 blog',
    ];

    public function index()
    {
        return view('blogs.index')
            ->with(['blogs' => $this->blogs]);
    }

    public function show($id)
     {
        return view('blogs.show')
            ->with(['blog' => $this->blogs[$id]]);
    }
}
