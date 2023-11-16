<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Requests\User\Student\StoreRequest;
use App\Http\Requests\User\Student\UpdateRequest;
use App\Models\StudentYearLevel;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{

  public function index()
  {
    $students = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->get();

    return view('modules.student.index', compact('students'));
  }

  public function create()
  {
    $gender = ['Male', 'Female'];

    $studentCount = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->count();

    $school_id = 'S' . str_pad($studentCount + 1, 4, '0', STR_PAD_LEFT);

    $strands = ['ACCOUNTING BUSINESSNESS MANAGEMENT', 'INFORMATION COMMUNICATION TECHNOLOGY', 'GENERAL ACADEMIC STRAND', 'HOME ECONOMICS', 'AUTOMOTIVE', 'ELECTRICAL INSTALLATION AND MAINTENANCE'];

    return view('modules.student.create', compact('school_id', 'gender', 'strands'));
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

    StudentYearLevel::create([
      'student_id' => $student->id,
      'year_level' => $validated['year_level'],
    ]);

    $student->assignRole('student');

    return redirect()->route('student.index')->with('success', 'Successfuly added new student!');
  }

  public function edit(User $student)
  {
    $gender = ['Male', 'Female'];

    return view('modules.student.edit', compact('gender', 'student'));

  }

  public function update(UpdateRequest $request, User $user)
  {

  }


  public function extract(Request $request)
  {
    $request->validate([
      'excel_file' => 'required|file|mimes:xlsx,xls',
    ]);

    $excelFile = $request->file('excel_file');

    if ($excelFile) {
      Excel::import(new StudentImport, $excelFile);


      // Redirect or display a success message
      return redirect()->route('student.index')->with('success', 'Successfully added new students!');
    }
  }
}
