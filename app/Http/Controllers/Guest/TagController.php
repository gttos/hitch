<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(string $slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $cards = $tag->cards()->where('is_approved', 1);
        return view('guest.tag-show', [
            'tag' => $tag,
            'cards' => $cards->cursorPaginate(6)
        ]);
    }
}

