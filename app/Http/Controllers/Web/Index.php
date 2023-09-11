<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('web.index', ['posts' => $posts]);
    }
}
