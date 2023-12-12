<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassAdvisory;
use App\Models\ClassSubject;
use App\Models\ClassSubGrade;
use App\Models\ClassAdvisoryStudent;

class GradeController extends Controller
{
  public function index(Request $request)
{
  $year_level = ClassAdvisoryStudent::where('student_id', auth()->user()->id)->get();
  $sems = ['1', '2'];

  $selectedGradeLevel = $request->input('grade_level');
  $semester = $request->input('sem');

  $grades = [];

  if ($selectedGradeLevel) {
      $grades = ClassSubGrade::whereHas('classSubject', function ($query) use ($semester, $selectedGradeLevel) {
              $query->where('semester', $semester);
          })
          ->where('student_id', auth()->user()->id)
          ->get();
  }



    $total_subjects = count($grades); // Total number of subjects
    $total_grades = 0;

    foreach ($grades as $grade) {
        // Calculate the GWA for each subject
        $gwa = ($grade->first_grading + $grade->second_grading) / 2;
        $grade->gwa = number_format($gwa, 2);

        // Accumulate the subject GWAs
        $total_grades += $gwa;
    }

    // Calculate the overall GWA by dividing the accumulated GWAs by the total number of subjects
    // Calculate the overall GWA only if there are subjects
    $overall_gwa = ($total_subjects > 0) ? ($total_grades / $total_subjects) : 0;

    return view('modules.grade-viewing.index', compact('selectedGradeLevel', 'year_level', 'grades', 'overall_gwa', 'semester', 'sems'));
}


}
