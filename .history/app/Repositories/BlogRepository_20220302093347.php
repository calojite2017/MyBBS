<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogRepository
{
    public function getNewBlogs($genre_no=false, $limit=false)
    {
        $image_host = config('app.hondana_url') ?? url('') . ':81';
        $books_query =  Book::select(
            'book.book_no',
            'book.name',
            DB::raw('CONCAT(\'' . $image_host . '\',image) as image'),
            'book.release_date',
            'book.price',
            'book.content',
            // 11/2追加
            'book.page',
            'stock_status.name as stockname',
            // 12/2追加
            // 'book_genre.book_genre_no',
            'book_genre.genre_no',
            'genre.name as genrename',
            'genre.genre_no'
            // ここまで
        )
            // ->whereRaw('DATE_FORMAT(release_date, \'%Y%m\') = DATE_FORMAT(NOW(), \'%Y%m\')') 12/2削除
            // 2021/11/2追加
            ->leftJoin('stock_status', 'book.stock_status_no', '=', 'stock_status.stock_status_no' )
            // 12/2追加
            ->leftJoin('book_genre', 'book_genre.book_no', '=', 'book.book_no')
            ->leftJoin('genre', 'book_genre.genre_no', '=', 'genre.genre_no')
            // ここまで
            ->orderBy('release_date', 'asc');
            // ->paginate($limit); 12/2削除

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
