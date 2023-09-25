<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());
        return view('guest.fav-show', [
            'cards' => $user->favCards()->cursorPaginate(6)
        ]);
    }

    public function store($id): void
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());
        $card = Card::findOrFail($id);

        $user->favCards()->toggle($card->id);
    }
}
