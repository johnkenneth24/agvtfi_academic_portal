<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\Student\StoreRequest;


class StudentController extends Controller
{

  public function index()
  {
    $students = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->paginate(10);

    return view('modules.student.index', compact('students'));
  }

  public function create()
  {
    $gender = ['Male', 'Female'];

    $studentCount = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->count();

    $school_id = 'S' . str_pad($studentCount + 1, 4, '0', STR_PAD_LEFT);

    return view('modules.student.create', compact('school_id', 'gender'));
  }

  public function store(StoreRequest $request)
  {
    $validated = $request->validated();

    $student = User::create([
      'school_id' => $validated['school_id'],
      'admission_date' => $validated['admission_date'],
      'firstname' => $validated['firstname'],
      'middlename' => $validated['middlename'],
      'lastname' => $validated['lastname'],
      'suffix' => $validated['suffix'],
      'gender' => $validated['gender'],
      'age' => $validated['age'],
      'birthdate' => $validated['birthdate'],
      'contact_number' => $validated['contact'],
      'email' => $validated['email'],
      'address' => $validated['address'],
      'password' => Hash::make($validated['school_id']),
    ]);
    $student->assignRole('student');



    return redirect()->route('student.index')->with('success', 'Successfuly added new student!');
  }
}
