<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassAdvisory;
use App\Models\ClassAdvisoryStudent;

class ClassAdvisoryController extends Controller
{
  public function index()
  {
     $classes = ClassAdvisory::where('teacher_id', auth()->user()->id)
     ->orderBy('status' , 'asc')
     ->get();


    return view('modules.class-advisory.index', compact('classes'));
  }

  public function create()
  {
    $students =  User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->get();

    return view('modules.class-advisory.create', compact('students'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'academic_year' => ['required'],
      'grade_level' => ['required'],
      'section' => ['required'],
      'student_id' => ['required', 'array'],
      'student_id.*' => ['required']
    ]);

    ClassAdvisory::where('teacher_id', auth()->user()->id)
        ->where('status', 'Active')
        ->update(['status' => 'Inactive']);

    $class_advisory = ClassAdvisory::create([
      'teacher_id' => auth()->user()->id,
      'academic_year'=>$validated['academic_year'],
      'grade_level' => $validated['grade_level'],
      'section' => $validated['section']
    ]);

    foreach($validated['student_id'] as $key => $value)
    {
      ClassAdvisoryStudent::create([
        'class_advisory_id' => $class_advisory->id,
        'student_id' => $validated['student_id'][$key],
      ]);
    }

    return redirect()->route('classad.index')->with('success', 'Addded New Class Advisory');
  }
}
