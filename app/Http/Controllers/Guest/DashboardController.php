<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $cards = Card::all();

        return view('guest.dashboard', ['cards' => $cards]);
    }
}
