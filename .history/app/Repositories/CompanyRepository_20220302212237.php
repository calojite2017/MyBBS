<?php

namespace App\Repositories;

use App\Models\Blog;
// use Illuminate\Support\Facades\DB;


class CompanyRepository
{
    public function getNewBlogs()
    {
        $query = Company::select(
            'id',
            'title',
            'value',
        )
            ->where('id', $id)
            ->first();

            return $query;
    }
}
