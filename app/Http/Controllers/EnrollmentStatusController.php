<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentYearLevel;

class EnrollmentStatusController extends Controller
{
    public function index()
    {
      $list_enrollment = StudentYearLevel::orderBy('created_at', 'desc')->get();

      

      return view('modules.enrollment-status.index', compact('list_enrollment'));
    }
}
