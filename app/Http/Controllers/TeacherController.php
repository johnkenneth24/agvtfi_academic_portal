<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\Teacher\StoreRequest;

class TeacherController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');

    $query = User::whereHas('roles', function ($query) {
      $query->where('name', 'teacher');
    })->with('class_adviser')->orderBy('school_id', 'asc');

    if ($search) {
      $query->where(function ($subQuery) use ($search) {
        $subQuery->where('school_id', 'like', '%' . $search . '%')
          ->orWhere('firstname', 'like', '%' . $search . '%')
          ->orWhere('lastname', 'like', '%' . $search . '%')
          ->orWhere('middlename', 'like', '%' . $search . '%')
          ->orWhere('gender', 'like', '%' . $search . '%')
          ->orWhereHas('class_adviser', function ($yearLevelQuery) use ($search) {
            $yearLevelQuery->where('grade_level', 'like', '%' . $search . '%');
          });
      });
    }

    $teachers = $query->paginate(10);

    return view('modules.teacher.index', compact('teachers'));
  }

  public function create()
  {
    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];

    $maxSchoolId = User::whereHas('roles', function ($query) {
      $query->where('name', 'teacher');
    })->max('school_id');

    $maxSchoolId = $maxSchoolId ? $maxSchoolId : 'T0000';

    $numericPart = (int)substr($maxSchoolId, 1);
    $nextNumericPart = $numericPart + 1;

    $school_id = 'T' . str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT);

    return view('modules.teacher.create', compact('school_id', 'gender', 'suffixes'));
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
      'age' => $validated['age'],
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

  public function edit(User $teacher)
  {
    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];

    return view('modules.teacher.edit', compact('teacher', 'gender', 'suffixes'));
  }

  public function update(Request $request, User $teacher)
  {

    $validated = $request->validate([
      'school_id' => ['required', Rule::unique('users')->ignore($teacher->id)],
      // 'admission_date' => 'required',
      'firstname' => 'required',
      'middlename' => 'nullable',
      'lastname' => 'nullable',
      'suffix' => 'nullable',
      'age' => 'required',
      'gender' => 'required',
      'birthdate' => 'required',
      'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
      'email' => ['required', 'email', Rule::unique('users')->ignore($teacher->id)],
      'address' => 'required',
    ]);

    // dd($teacher, $validated);

    $teacher->update($validated);

    return redirect()->route('teacher.index')->with('success', 'Teacher information updated successfully!');
  }

  public function show(User $teacher)
  {
    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];

    return view('modules.teacher.view', compact('teacher', 'gender', 'suffixes'));
  }

  public function delete(User $teacher)
  {
    if ($teacher) {
      $teacher->delete();
      return redirect()->route('teacher.index')->with('success', 'Successfully deleted teacher record!');
    }

    return redirect()->route('teacher.index')->with('error', 'Teacher record not found!');
  }
}
