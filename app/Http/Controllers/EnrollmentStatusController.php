<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentYearLevel;

class EnrollmentStatusController extends Controller
{
  public function index()
  {
    $user_id = auth()->user()->id;

    $list_enrollment = StudentYearLevel::where('student_id', $user_id)->orderBy('created_at', 'desc')->get();

    return view('modules.enrollment-status.index', compact('list_enrollment'));
  }
}
