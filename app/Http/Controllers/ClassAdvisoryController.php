<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassAdvisoryController extends Controller
{
    public function index()
    {
      return view('modules.class-advisory.index');
    }

    public function create()
    {
      return view('modules.class-advisory.create');
    }
}
