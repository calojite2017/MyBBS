<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::select(
            'id',
            'title',
            'value',
        )
            ->where('id', $id)
            ->first();

        if (is_null($company)) {
            abort(404);
        }

        return view('company.index')
            ->with(['company' => $company]);
    }

    public function contact()
    {
        return view('company.contact');
    }
}
