<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fluid extends Controller
{
  public function index()
  {
    return view('template.content.layouts-example.layouts-fluid');
  }
}
