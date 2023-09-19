<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
      return view('modules.class-subject.index');
    }

    public function create()
    {
      return view('modules.class-subject.create');
    }

    public function setGrade()
    {
      return view('modules.class-subject.set-grade');
    }

    public function view()
    {
      return view('modules.class-subject.view');
    }
}
