<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\StudentYearLevel;
use App\Models\User;

class EnrollmentController extends Controller
{
  public function index(Request $request)
  {

    $search = $request->input('search');

    $query = Enrollment::orderBy('start', 'asc');

    if ($search) {
      $query->where(function ($query) use ($search) {
        $query->where('subject', 'like', '%' . $search . '%')
          ->orWhere('start', 'like', '%' . $search . '%')
          ->orWhere('status', 'like', '%' . $search . '%')
          ->orWhere('end', 'like', '%' . $search . '%');
      });
    }

    $enrollments = $query->paginate(10);

    // $enrollments = Enrollment::orderBy('start', 'asc')->get();



    return view('modules.enrollment.index', compact('enrollments'));
  }

  public function create()
  {
    return view('modules.enrollment.create');
  }

  public function store(Request $request)
  {
    $validate = $request->validate([
      'subject' => 'required',
      'start' => 'required',
      'end' => 'required',
      'enrollment_type' => 'required'
    ]);

    Enrollment::create([
      'subject' => $validate['subject'],
      'enrollment_type' => $validate['enrollment_type'],

      'start' => $validate['start'],
      'end' => $validate['end']
    ]);

    return redirect()->route('enrollment.index')->with('success', 'Enrollment successfully saved!');
  }

  public function enrollNow(Request $request)
  {
    $enroll_level = $request->input('grade_level');
    $semester = $request->input('semester');

    StudentYearLevel::create([
      'student_id' => auth()->user()->id,
      'year_level' => $enroll_level,
      'semester' => $semester,
      'status' => 'Pending'
    ]);

    return redirect()->route('enrollment-stat.index')->with('success', 'Enrollment successfully submitted!');
  }

  public function viewApplicationList(Enrollment $enrollment)
  {

    $pendings = StudentYearLevel::where('status', 'Pending')
      ->orderBy('created_at', 'asc')
      ->get();


    return view('modules.enrollment.view-app-list', compact('pendings', 'enrollment'));
  }

  public function approved(StudentYearLevel $pending, Enrollment $enrollment)
  {
    $current = StudentYearLevel::where('student_id', $pending->student_id)
      ->where('status', 'Current')
      ->first();

    $current->update([
      'status' => 'Inactive'
    ]);

    $current = StudentYearLevel::where('student_id', $pending->student_id)
      ->where('status', 'Pending')
      ->first();

    $current->update([
      'status' => 'Current'
    ]);

    return redirect()->route('enrollment.view-app-list', $enrollment->id)->with('success', 'Enrollment successfully approved!');
  }

  public function edit(Enrollment $enrollment)
  {

    return view('modules.enrollment.edit', compact('enrollment'));
  }

  public function update(Enrollment $enrollment, Request $request)
  {
    $validate = $request->validate([
      'subject' => 'required',
      'start' => 'required',
      'end' => 'required'
    ]);

    $enrollment->update([
      'subject' => $validate['subject'],
      'start' => $validate['start'],
      'end' => $validate['end']
    ]);

    return redirect()->route('enrollment.edit', $enrollment->id)->with('success', 'Enrollment successfully updated!');
  }

  public function deactivate(Enrollment $enrollment)
  {
    $enrollment->update([
      'status' => 'Deactivated'
    ]);

    return redirect()->route('enrollment.index')->with('success', 'Enrollment deactivated successfully!');
  }

  public function delete(Enrollment $enrollment)
  {
    $enrollment->delete();

    return redirect()->route('enrollment.index')->with('success', 'Enrollment deleted successfully!');
  }
}
