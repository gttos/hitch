<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Basic extends Controller
{
  public function index()
  {
    return view('template.content.tables.tables-basic');
  }
}
