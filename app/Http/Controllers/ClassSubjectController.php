<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubject;
use App\Models\ClassAdvisory;
use App\Models\ClassAdvisoryStudent;

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
        'year_section_id'=>$validated['year_section_id'],
        'subject_code' => $validated['subject_code'],
        'subject_name' => $validated['subject_name']
      ]);

      return redirect()->back()->with('success', 'Addded New Class Subject!');
    }

    public function create()
    {
      return view('modules.class-subject.create');
    }

    public function setGrade(ClassSubject $class)
    {
      $class_students = ClassAdvisoryStudent::where('class_advisory_id', $class->classAdvisory->id)
      ->get();

      return view('modules.class-subject.set-grade', compact('class', 'class_students'));
    }

    public function view()
    {
      return view('modules.class-subject.view');
    }
}
