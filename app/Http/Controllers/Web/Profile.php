<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());

        return view('web.profile', ['user' => $user]);
    }
}
