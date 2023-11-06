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

     $strands = ['ACCOUNTING BUSINESSNESS MANAGEMENT', 'INFORMATION COMMUNICATION TECHNOLOGY', 'GENERAL ACADEMIC STRAND', 'HOME ECONOMICS', 'AUTOMOTIVE', 'ELECTRICAL INSTALLATION AND MAINTENANCE'];


    return view('modules.class-advisory.index', compact('classes', 'strands'));
  }

  public function classStudent(ClassAdvisory $student)
  {
    $student_name =  User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->get();

    $student_list = ClassAdvisoryStudent::where('class_advisory_id', $student->id)
    ->get();

    return view('modules.class-advisory.student', compact('student', 'student_name', 'student_list'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'academic_year' => ['required'],
      'grade_level' => ['required'],
      'section' => ['required'],
    ]);

    ClassAdvisory::where('teacher_id', auth()->user()->id)
        ->where('status', 'Active')
        ->update(['status' => 'Inactive']);

    ClassAdvisory::create([
      'teacher_id' => auth()->user()->id,
      'academic_year'=>$validated['academic_year'],
      'grade_level' => $validated['grade_level'],
      'section' => $validated['section']
    ]);

    return redirect()->route('classad.index')->with('success', 'Addded New Class Advisory');
  }

   public function update(Request $request, ClassAdvisory $classAd)
  {
    $validated = $request->validate([
      'academic_year' => ['required'],
      'grade_level' => ['required'],
      'section' => ['required'],
    ]);

    $classAd->update([
      'teacher_id' => auth()->user()->id,
      'academic_year'=>$validated['academic_year'],
      'grade_level' => $validated['grade_level'],
      'section' => $validated['section']
    ]);

    return redirect()->route('classad.index')->with('success', 'Updated Class Advisory');
  }

  public function storeClassStudent(Request $request)
  {
      $validated = $request->validate([
          'class_advisory_id' => ['required'],
          'student_id' => ['required']
      ]);

      if ($validated['student_id'] == 'NA') {
          return redirect()->back()->withErrors('Please Select Student!');
      }

      $existingStudent = ClassAdvisoryStudent::where('class_advisory_id', $validated['class_advisory_id'])
          ->where('student_id', $validated['student_id'])
          ->first();

      if ($existingStudent) {
          return redirect()->back()->withErrors('Student already exists in the advisory class!');
      }

      ClassAdvisoryStudent::create([
          'class_advisory_id' => $validated['class_advisory_id'],
          'student_id' => $validated['student_id']
      ]);

      return redirect()->back()->with('success', 'New student added!');
  }

  public function studentInfo(ClassAdvisoryStudent $student)
  {
    return view('modules.class-advisory.studen-info', compact('student'));
  }

  public function deleteStudent(ClassAdvisoryStudent $student)
  {
    $student->delete();

    return redirect()->back()->with('success','Successfully remove to the class!');
  }


}
