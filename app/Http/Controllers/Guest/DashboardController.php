<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $posts = Post::all();

        return view('guest.dashboard', ['posts' => $posts]);
    }
}
