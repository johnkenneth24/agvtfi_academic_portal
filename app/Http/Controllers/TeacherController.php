<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
  public function index()
  {
    return view('modules.teacher.index');
  }

  public function create()
  {
    return view('modules.teacher.create');
  }

  public function store()
  {
    
  }
}
