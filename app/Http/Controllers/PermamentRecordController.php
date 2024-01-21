<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubGrade;
use App\Models\User;
use App\Models\ClassAdvisory;

class PermamentRecordController extends Controller
{
  public function index()
  {
    $studentId = auth()->user()->id;

    $firstGradeFirstSem = ClassSubGrade::where('student_id', auth()->user()->id)
      ->where('gradeLevel', 11)
      ->where('semester', 1)
      ->get();

    $firstGradeFirstSemTotal_grades = 0;

    foreach ($firstGradeFirstSem as $grade) {
      // Calculate the GWA for each subject
      $gwa = ($grade->first_grading + $grade->second_grading) / 2;
      $grade->gwa = number_format($gwa, 2);

      // Accumulate the subject GWAs
      $firstGradeFirstSemTotal_grades += $gwa;
    }

    $firstGradeSecondSem = ClassSubGrade::where('student_id', auth()->user()->id)
      ->where('gradeLevel', 11)
      ->where('semester', 2)
      ->get();

    $firstGradeSecondSemTotal_grades = 0;

    foreach ($firstGradeSecondSem as $grade) {
      // Calculate the GWA for each subject
      $gwa = ($grade->first_grading + $grade->second_grading) / 2;
      $grade->gwa = number_format($gwa, 2);

      // Accumulate the subject GWAs
      $firstGradeSecondSemTotal_grades += $gwa;
    }

    $secondGradeFirstSem = ClassSubGrade::where('student_id', auth()->user()->id)
      ->where('gradeLevel', 12)
      ->where('semester', 1)
      ->get();

      $secondGradeFirstSemTotal_grades = 0;

      foreach ($secondGradeFirstSem as $grade) {
        // Calculate the GWA for each subject
        $gwa = ($grade->first_grading + $grade->second_grading) / 2;
        $grade->gwa = number_format($gwa, 2);

        // Accumulate the subject GWAs
        $secondGradeFirstSemTotal_grades += $gwa;
      }

    $secondGradeSecondSem = ClassSubGrade::where('student_id', auth()->user()->id)
      ->where('gradeLevel', 12)
      ->where('semester', 2)
      ->get();

      $ssecondGradeSecondSemTotal_grades = 0;

      foreach ($secondGradeSecondSem as $grade) {
        // Calculate the GWA for each subject
        $gwa = ($grade->first_grading + $grade->second_grading) / 2;
        $grade->gwa = number_format($gwa, 2);

        // Accumulate the subject GWAs
        $ssecondGradeSecondSemTotal_grades += $gwa;
      }



    return view('modules.permament.index', compact('firstGradeFirstSem', 'firstGradeSecondSem', 'secondGradeFirstSem', 'secondGradeSecondSem'));
  }

  public function adminIndex($student)
  {

    $subGrades = ClassSubGrade::where('student_id', $student)
      ->whereNotNull('fourth_grading')
      ->get();

    $total_subjects = count($subGrades); // Total number of subjects
    $total_grades = 0;

    foreach ($subGrades as $grade) {
      // Calculate the GWA for each subject
      $gwa = ($grade->first_grading + $grade->second_grading) / 2;
      $grade->gwa = number_format($gwa, 2);

      // Accumulate the subject GWAs
      $total_grades += $gwa;
    }

    $class = ClassAdvisory::orderBy('academic_year', 'asc')
      ->get();

    return view('modules.permament.index', compact('subGrades', 'class'));
  }
}
