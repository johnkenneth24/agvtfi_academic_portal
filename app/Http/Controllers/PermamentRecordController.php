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

        $subGrades = ClassSubGrade::where('student_id', $studentId)
            ->whereNotNull('second_grading')
            ->get();

        $total_subjects = count($subGrades); // Total number of subjects
        $total_grades = 0;

        foreach ($subGrades as $grade) {
            // Calculate the GWA for each subject
            $gwa = ($grade->first_grading + $grade->second_grading ) / 2;
            $grade->gwa = number_format($gwa, 2);

            // Accumulate the subject GWAs
            $total_grades += $gwa;
        }

        $class = ClassAdvisory::orderBy('academic_year', 'asc')
            ->get();

        return view('modules.permament.index', compact('subGrades', 'class'));
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
            $gwa = ($grade->first_grading + $grade->second_grading ) / 2;
            $grade->gwa = number_format($gwa, 2);

            // Accumulate the subject GWAs
            $total_grades += $gwa;
        }

        $class = ClassAdvisory::orderBy('academic_year', 'asc')
            ->get();

        return view('modules.permament.index', compact('subGrades', 'class'));
    }
}
