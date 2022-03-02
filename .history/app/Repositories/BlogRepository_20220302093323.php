<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogRepository
{
    
    // 新刊一覧・ジャンル別一覧
    public function getNewBooks($genre_no=false, $limit=false)
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

    // 220119トップページなど
    public function getBookSalesInfoList(
        $limit,
        $use_paginate = false,
        $order_rule = 'release_date_desc',
        $keywords = null,
        $name = null,
        $author_name = null,
        $series_no = null,
        $genre_no = null,
        $isbn = null,
        $min_release_date = null,
        $max_release_date = null,
        // 11/2追加★
        $recommend_status = null,
    ) {
        $query = $this->selectBookSalesInfo();

        //絞り込みに使用するカラムをJOIN
        if ($keywords != null) {
            $query
                ->leftJoin('opus', 'book.book_no', 'opus.book_no')
                ->leftJoin('author', 'opus.author_no', 'author.author_no')
                ->leftJoin('book_series', 'book.book_no', 'book_series.book_no')
                ->leftJoin('series', 'book_series.series_no', 'series.series_no')
                ->leftJoin('book_genre', 'book.book_no', 'book_genre.book_no')
                ->leftJoin('genre', 'book_genre.genre_no', 'genre.genre_no');
        } else {
            if ($author_name != null) {
                $query
                    ->leftJoin('opus', 'book.book_no', 'opus.book_no')
                    ->leftJoin('author', 'opus.author_no', 'author.author_no');
            }
            if ($series_no != null) {
                $query
                    ->leftJoin('book_series', 'book.book_no', 'book_series.book_no');
            }
            if ($genre_no != null) {
                $query
                    ->leftJoin('book_genre', 'book.book_no', 'book_genre.book_no');
            }
        }

        //絞り込み
        if ($isbn != null) {
            $query->where('book.isbn', $isbn);
        }
        // 11/2追加★
        if ($recommend_status != null) {
            $query->where('book.recommend_status', $recommend_status);
        }
        // ここまで★
        if ($series_no != null) {
            $query->where('book_series.series_no', $series_no);
        }
        if ($genre_no != null) {
            $query->where('book_genre.genre_no', $genre_no);
        }
        if ($min_release_date != null) {
            $query->where('release_date', '>=', $min_release_date);
        }
        if ($max_release_date != null) {
            $query->where('release_date', '<=', $max_release_date);
        }
        if ($name != null) {
            $query->where('book.name', 'LIKE', "%$name%");
        }
        if ($author_name != null) {
            $query->where('author.name', 'LIKE', "%$author_name%");
        }
        if ($keywords != null) {
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query
                        ->where('book.name', 'LIKE', "%$keyword%")
                        ->orWhere('author.name', 'LIKE', "%$keyword%")
                        ->orWhere('series.name', 'LIKE', "%$keyword%")
                        ->orWhere('genre.name', 'LIKE', "%$keyword%");
                });
            }
        }

        //並び替え
        switch ($order_rule) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'release_date_asc':
                $query->orderBy('release_date', 'asc');
                break;
            case 'release_date_desc':
            default:
                $query->orderBy('release_date', 'desc');
                break;
        }

        $query->groupBy('book.book_no');

        // 220119
        $query = $this->getResult($query, $limit, $use_paginate);
        // dd($query);
        return $query;
    }

    public function getSeriesList()
    {
        return Series::all();
    }

    // 12/3これ利用する→index.blade.php
    public function getGenres()
    {
        return DB::table('genre')->get();
    }

    // 12/7 追加
    public function getGenresByNo($genre_no)
    {
        return DB::table('genre')->where('genre_no', $genre_no)->first();
    }

    private function getResult($query, $limit, $use_paginate)
    {
        if ($use_paginate) {
            return $query->paginate($limit);
        } else {
            return $query->limit($limit)->get();
        }
    }

    // 220119トップページもと
    private function selectBookSalesInfo()
    {
        $image_host = config('app.hondana_url') ?? url('') . ':81';
        return  Book::select(
            'book.book_no',
            'book.name',
            DB::raw('CONCAT(\'' . $image_host . '\',book.image) as image'),
            'book.release_date',
            'book.price',
            // 11/4
            'book.page',
            'stock_status.name as stock_name',
            // 220119
            // 'book_reviews.user_id',
            // 'book_reviews.stars',
            // 'book_reviews.comment',
        )
        ->leftJoin('stock_status', 'book.stock_status_no', '=', 'stock_status.stock_status_no')
        // ->leftJoin('book_reviews', 'book_reviews.book_no', '=', 'book.book_no')
        ;
    }

    public function getSeriesBooks($series_no, $limit)
    {
        $image_host = config('app.hondana_url') ?? url('') . ':81';
        return Book::select(
            'book.book_no',
            'book.name',
            DB::raw('CONCAT(\'' . $image_host . '\',image) as image'),
            'book.release_date',
            'book.price',
            'book.content',
            'book.page',
            'stock_status.name as stockname',
            'book_series.series_no',
            'series.name as series_name',
        )
            ->leftJoin('stock_status', 'book.stock_status_no', '=', 'stock_status.stock_status_no')
            ->leftJoin('book_series', 'book_series.book_no', '=', 'book.book_no')
            ->leftJoin('series', 'series.series_no', '=', 'book_series.series_no')
            ->where('book_series.series_no', '=', $series_no)
            ->orderBy('release_date', 'asc')
            ->paginate($limit);
    }
}
