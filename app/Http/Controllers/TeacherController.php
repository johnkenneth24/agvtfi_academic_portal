<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\Teacher\StoreRequest;

class TeacherController extends Controller
{
  public function index()
  {
    $teachers = User::whereHas('roles', function ($query) {
      $query->where('name', 'teacher');
    })->paginate(10);

    return view('modules.teacher.index', compact('teachers'));
  }

  public function create()
  {
    $gender = ['Male', 'Female'];

    $teacherCount = User::whereHas('roles', function ($query) {
      $query->where('name', 'teacher');
    })->count();

    $school_id = 'T' . str_pad($teacherCount + 1, 4, '0', STR_PAD_LEFT);

    return view('modules.teacher.create', compact('school_id', 'gender'));
  }

  public function store(StoreRequest $request)
  {
    $validated = $request->validated();

    $student = User::create([
      'school_id' => $validated['school_id'],
      'firstname' => $validated['firstname'],
      'middlename' => $validated['middlename'],
      'lastname' => $validated['lastname'],
      'suffix' => $validated['suffix'],
      'gender' => $validated['gender'],
      'birthdate' => $validated['birthdate'],
      'contact_number' => $validated['contact'],
      'email' => $validated['email'],
      'address' => $validated['address'],
      'password' => Hash::make($validated['school_id']),
    ]);
    $student->assignRole('teacher');



    return redirect()->route('teacher.index')->with('success', 'Successfuly added new teacher!');
  }
}
