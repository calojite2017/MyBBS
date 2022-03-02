<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostRepository
{
    public function getNewPosts($limit=false)
    {
        $blogs_query =  Post::latest();

            return $blogs_query->paginate($limit);
    }
}
