<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassSectionController extends Controller
{
  public function index()
  {
    return view('modules.class-section.index');
  }
}
