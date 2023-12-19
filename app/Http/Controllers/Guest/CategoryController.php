<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $name)
    {
        $category = Category::where('slug', $name)->first();
        $cards = $category->cards()->where('is_approved', 1);
        return view('guest.tip-show', [
            'category' => $category,
            'cards' => $cards->cursorPaginate(6)
        ]);
    }
}
