<?php

namespace App\Http\Controllers\form_layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorizontalForm extends Controller
{
  public function index()
  {
    return view('template.content.form-layout.form-layouts-horizontal');
  }
}
