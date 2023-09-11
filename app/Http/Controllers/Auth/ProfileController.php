<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());

        return view('web.profile', ['user' => $user]);
    }
}
