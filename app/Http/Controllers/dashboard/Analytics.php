<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class Analytics extends Controller
{
  public function index()
  {
    return view('template.content.dashboard.dashboards-analytics');
  }
}
