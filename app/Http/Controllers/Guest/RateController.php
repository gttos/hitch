<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'value' => ['required', 'string']
        ]);

        Rate::create([
            'value' => intval($request->value),
            'card_id' => $id,
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);

        return Redirect::route('guest.dashboard');
    }
}
