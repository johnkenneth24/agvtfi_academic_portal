<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\Enrollment;
use App\Models\StudentYearLevel;

class DashboardController extends Controller
{
    public function dashboard()
    {
      $anns = announcement::orderBy('date', 'desc')
      ->get();

      $current_year = StudentYearLevel::where('student_id', auth()->user()->id)
      ->where('status', 'Current')
      ->first();

      $pending_year = StudentYearLevel::where('student_id', auth()->user()->id)
      ->where('status', 'Pending')
      ->first();

      $enrollment = Enrollment::where('status', 'Active')->first();

      return view('modules.dashboard', compact('anns', 'enrollment', 'current_year', 'pending_year'));
    }
}
