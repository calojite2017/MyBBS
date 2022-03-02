<?php

namespace App\Repositories;

use App\Models\Blog;
// use Illuminate\Support\Facades\DB;


class CompanyRepository
{
    public function getCompanyDetail()
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
