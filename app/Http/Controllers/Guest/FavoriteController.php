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
        if (Auth::check()){
            $user = User::findOrFail(Auth::user()->getAuthIdentifier());
            return view('guest.fav-show', [
                'cards' => $user->favCards()->cursorPaginate(6)
            ]);
        }
        return view('guest.fav-show', [
            'cards' => collect()
        ]);
    }

    public function store($id): string
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());
        $card = Card::findOrFail($id);

        $toggled = $user->favCards()->toggle($card->id);

        if (empty($toggled['attached'])){
            return response(['status' => 'attached'], 201);
        }
        return response(['status' => 'detached'], 404);
    }
}
