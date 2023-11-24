<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Validation\Rule;
use App\Models\StudentYearLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\User\Student\StoreRequest;
use App\Http\Requests\User\Student\UpdateRequest;


class StudentController extends Controller
{

  public function index(Request $request)
  {
    $search = $request->input('search');

    $query = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->with('studentYearLevel')->orderBy('school_id', 'asc');

    if ($search) {
      $query->where(function ($subQuery) use ($search) {
        $subQuery->where('school_id', 'like', '%' . $search . '%')
          ->orWhere('firstname', 'like', '%' . $search . '%')
          ->orWhere('lastname', 'like', '%' . $search . '%')
          ->orWhere('middlename', 'like', '%' . $search . '%')
          ->orWhere('gender', 'like', '%' . $search . '%')
          ->orWhereHas('studentYearLevel', function ($yearLevelQuery) use ($search) {
            $yearLevelQuery->where('year_level', 'like', '%' . $search . '%');
          });
      });
    }

    $students = $query->paginate(10);

    return view('modules.student.index', compact('students'));
  }

  public function create()
  {
    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];

    $maxSchoolId = User::whereHas('roles', function ($query) {
      $query->where('name', 'student');
    })->max('school_id');

    $maxSchoolId = $maxSchoolId ? $maxSchoolId :  date('y') . '0000';

    $numericPart = (int)substr($maxSchoolId, 2);
    $nextNumericPart = $numericPart + 1;

    $school_id = date('y') . str_pad($nextNumericPart, 4, '0', STR_PAD_LEFT);

    $strands = ['ACCOUNTING BUSINESSNESS MANAGEMENT', 'INFORMATION COMMUNICATION TECHNOLOGY', 'GENERAL ACADEMIC STRAND', 'HOME ECONOMICS', 'AUTOMOTIVE', 'ELECTRICAL INSTALLATION AND MAINTENANCE'];

    return view('modules.student.create', compact('school_id', 'gender', 'strands', 'suffixes'));
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
      'contact_number' =>  $validated['contact'],
      'email' => $validated['email'],
      'address' => $validated['address'],
      'password' => Hash::make($validated['school_id']),
    ]);

    StudentYearLevel::create([
      'student_id' => $student->id,
      'year_level' => $validated['year_level'],
    ]);

    $student->assignRole('student');

    return redirect()->route('student.index')->with('success', 'Successfully added new student!');
  }

  public function edit(User $student)
  {

    $student->load('studentYearLevel');

    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];


    return view('modules.student.edit', compact('gender', 'student', 'suffixes'));
  }

  public function update(Request $request, User $student)
  {

    // dd($student);

    $validated = $request->validate([
      'school_id' => ['required', Rule::unique('users')->ignore($student->id)],
      'admission_date' => 'required',
      'firstname' => 'required',
      'middlename' => 'nullable',
      'lastname' => 'nullable',
      'suffix' => 'nullable',
      'age' => 'required',
      'gender' => 'required',
      'birthdate' => 'required',
      'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
      'email' => ['required', 'email', Rule::unique('users')->ignore($student->id)],
      'address' => 'required',
      'year_level' => 'nullable'
    ]);

    // dd($validated, $student);

    $student->update($validated);

    $student->studentYearLevel()->update([
      'year_level' => $validated['year_level'],
    ]);

    return redirect()->route('student.index')->with('success', 'Successfully updated user information!');
  }

  public function show(User $student)
  {
    $student->load('studentYearLevel');

    $gender = ['Male', 'Female'];
    $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV'];


    return view('modules.student.view', compact('gender', 'student', 'suffixes'));
  }

  public function delete(User $student)
  {
    if ($student) {
      $student->delete();
      return redirect()->route('student.index')->with('success', 'Successfully deleted student!');
    }

    return redirect()->route('student.index')->with('error', 'Student not found!');
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
