<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Offcanvas extends Controller
{
  public function index()
  {
    return view('template.content.user-interface.ui-offcanvas');
  }
}
