<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentStatusController extends Controller
{
    public function index()
    {

      return view('modules.enrollment-status.index');
    }
}
