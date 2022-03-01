<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return redirect(route('lindex',
        [
            'user_id' => $user->id,
        ]));
    }
}
