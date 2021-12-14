<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class TopPageServer extends Controller
{
    public function index()
    {
        $news = News::all();
        dd($news);
        return view('index', $news);
    }
}
