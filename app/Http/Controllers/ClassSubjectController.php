<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubject;
use App\Models\ClassAdvisory;
use App\Models\ClassAdvisoryStudent;
use App\Models\ClassSubGrade;

class ClassSubjectController extends Controller
{
  public function index()
  {
    $classes = ClassAdvisory::where('status', 'Active')
      ->get();

    $class_subject = ClassSubject::get();

    return view('modules.class-subject.index', compact('classes', 'class_subject'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'year_section_id' => ['required'],
      'subject_code' => ['required'],
      'subject_name' => ['required'],
    ]);

    ClassSubject::create([
      'teacher_id' => auth()->user()->id,
      'year_section_id' => $validated['year_section_id'],
      'subject_code' => $validated['subject_code'],
      'subject_name' => $validated['subject_name']
    ]);

    return redirect()->back()->with('success', 'Addded New Class Subject!');
  }



  public function setGrade(ClassSubject $class)
  {
    $classAdvisory = $class->classAdvisory;

    // Get student grades for the given class and class subject
    $student_grade = ClassSubGrade::where('class_advisory_id', $classAdvisory->id)
      ->where('class_sub_id', $class->id)
      ->get();

    // Calculate the GWA for each grade in the $student_grade collection
    foreach ($student_grade as $student) {
      $total_grades = $student->first_grading + $student->second_grading + $student->third_grading + $student->fourth_grading;
      $gwa = $total_grades / 4; // Assuming equally weighted grades
      $student->gwa = number_format($gwa, 2); // Add GWA to the student object
    }


    // Get a list of all students in the class advisory
    $class_students = ClassAdvisoryStudent::where('class_advisory_id', $classAdvisory->id)
    ->get();

    // Extract the student IDs from the $student_grade collection
    $studentGradeIds = $student_grade->pluck('student_id')->all();

    // Filter out students who don't have a student grade
    $studentsWithoutGrade = $class_students->whereNotIn('student_id', $studentGradeIds);

    return view('modules.class-subject.set-grade', compact('class', 'studentsWithoutGrade', 'student_grade'));
  }


  public function setGradeStore(Request $request, ClassSubGrade $class)
  {
    $validated = $request->validate([
      'class_advisory_id' => ['required', 'array'],
      'class_advisory_id.*' => ['required'],

      'student_id' => ['required', 'array'],
      'student_id.*' => ['required'],

      'class_sub_id' => ['required', 'array'],
      'class_sub_id.*' => ['required'],

      'first_grading' => ['nullable', 'array'],
      'first_grading.*' => ['nullable'],

      'second_grading' => ['nullable', 'array'],
      'second_grading.*' => ['nullable'],

      'third_grading' => ['nullable', 'array'],
      'third_grading.*' => ['nullable'],

      'fourth_grading' => ['nullable', 'array'],
      'fourth_grading.*' => ['nullable'],
    ]);

    foreach ($validated['student_id'] as $key => $value) {
      ClassSubGrade::create([
        'class_advisory_id' => $validated['class_advisory_id'][$key],
        'student_id' => $validated['student_id'][$key],
        'class_sub_id' => $validated['class_sub_id'][$key],
        'first_grading' => $validated['first_grading'][$key],
        'second_grading' => $validated['second_grading'][$key],
        'third_grading' => $validated['third_grading'][$key],
        'fourth_grading' => $validated['fourth_grading'][$key]
      ]);
    }

    return redirect()->back()->with('success', 'Grades have been saved!');
  }

  public function setGradeUpdate(Request $request, ClassSubGrade $grade)
  {
    $validated = $request->validate([
      'id' => ['required', 'array'],
      'id.*' => ['required'],

      'class_advisory_id' => ['required', 'array'],
      'class_advisory_id.*' => ['required'],

      'student_id' => ['required', 'array'],
      'student_id.*' => ['required'],

      'class_sub_id' => ['required', 'array'],
      'class_sub_id.*' => ['required'],

      'first_grading' => ['nullable', 'array'],
      'first_grading.*' => ['nullable'],

      'second_grading' => ['nullable', 'array'],
      'second_grading.*' => ['nullable'],

      'third_grading' => ['nullable', 'array'],
      'third_grading.*' => ['nullable'],

      'fourth_grading' => ['nullable', 'array'],
      'fourth_grading.*' => ['nullable'],
    ]);

    // dd($validated);

    foreach ($validated['student_id'] as $key => $value) {

      // dd($validated['student_id'][$key]);
      $student_grade = ClassSubGrade::find($validated['id'][$key]);

      $student_grade->update([
        'class_advisory_id' => $validated['class_advisory_id'][$key],
        'student_id' => $validated['student_id'][$key],
        'class_sub_id' => $validated['class_sub_id'][$key],
        'first_grading' => $validated['first_grading'][$key],
        'second_grading' => $validated['second_grading'][$key],
        'third_grading' => $validated['third_grading'][$key],
        'fourth_grading' => $validated['fourth_grading'][$key]
      ]);

    }
    return redirect()->back()->with('success', 'Grades have been updated!');
  }


}

