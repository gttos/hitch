<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id): void
    {
        $request->validate([
            'vote' => ['required', 'string']
        ]);

        Vote::create([
            'vote' => intval($request->vote),
            'card_id' => $id,
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);
    }
}
