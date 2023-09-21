<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class QrController extends Controller
{
    public function index()
    {
        return view('guest.qr');
    }
}
