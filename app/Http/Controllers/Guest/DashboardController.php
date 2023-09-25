<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        $cards = Card::cursorPaginate(9);

        return view('guest.dashboard', [
            'cards' => $cards
        ]);
    }
}
