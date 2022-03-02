<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogRepository
{
    public function getNewBlogs($limit=false)
    {
        $blogs_query =  Blog::latest();

            // 12/2追加
            if ($genre_no) {
                $books_query->where('genre.genre_no', '=', $genre_no);
            }
            else {
                $books_query->whereRaw('DATE_FORMAT(release_date, \'%Y%m\') = DATE_FORMAT(NOW(), \'%Y%m\')');
            }
            return $books_query->paginate($limit);
    }
}
