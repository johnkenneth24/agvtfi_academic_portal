<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
      return view('modules.enrollment.index');
    }

    public function create()
    {
      return view('modules.enrollment.create');
    }

    public function viewApplicationList()
    {
      return view('modules.enrollment.view-app-list');
    }
}
