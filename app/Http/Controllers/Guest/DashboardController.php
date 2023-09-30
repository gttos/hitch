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
        $cards = Card::where('is_approved', 1);

        return view('guest.dashboard', [
            'cards' => $cards->cursorPaginate(9)
        ]);
    }
}
