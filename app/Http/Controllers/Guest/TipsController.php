<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $category = Category::where('name', $name)->first();
        return view('guest.tip-show', [
            'category' => $category,
            'cards' => $category->cards()->cursorPaginate(6)
        ]);
    }
}
