<?php

namespace App\Repositories;

use App\Models\Blog;
// use Illuminate\Support\Facades\DB;


class CompanyRepository
{
    public function getNewBlogs($limit=false)
    {
        $blogs_query =  Blog::latest();

            return $blogs_query->paginate($limit);
    }
}
