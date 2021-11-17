<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopPageServer extends Controller
{
    public function index()
    {
        return view('index');
    }
}
