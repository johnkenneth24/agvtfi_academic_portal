<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
      return view('modules.student.index');
    }

    public function create()
    {
      return view('modules.student.create');
    }
}
