<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Company;
// use Illuminate\Support\Facades\DB;

class CompanyRepository
{
    public function getCompanyDetails($id)
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
