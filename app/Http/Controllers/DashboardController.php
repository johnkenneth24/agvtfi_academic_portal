<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\Enrollment;
use App\Models\StudentYearLevel;
use App\Models\ClassSubGrade;

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

    $grades = ClassSubGrade::where('student_id', auth()->user()->id)
      ->where('gradeLevel', $current_year->year_level)
      ->where('semester', $current_year->semester)
      ->get();

    $total_subjects = count($grades); // Total number of subjects
    $total_grades = 0;

    foreach ($grades as $grade) {
      // Calculate the GWA for each subject
      $gwa = ($grade->first_grading + $grade->second_grading) / 2;
      $grade->gwa = number_format($gwa, 2);

      // Accumulate the subject GWAs
      $total_grades += $gwa;
    }

    $overall_gwa = ($total_subjects > 0) ? ($total_grades / $total_subjects) : 0;

    // dd($overall_gwa);

    return view('modules.dashboard', compact('overall_gwa','anns', 'enrollment', 'current_year', 'pending_year'));
  }
}
