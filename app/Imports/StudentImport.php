<?php

namespace App\Imports;

use App\Models\StudentYearLevel;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class StudentImport implements ToModel,WithHeadingRow
{
  public function model(array $row)
{
    // Convert the Excel date serial number to a human-readable date format
    $dateValue = Carbon::createFromFormat('U', strtotime('1900-01-01') + $row['admission_date'] * 24 * 3600);

    $user = new User([
      'school_id' => $row['school_id'],
      'admission_date' => $dateValue->format('Y-m-d'),
      'firstname' => $row['firstname'],
      'middlename' => $row['middlename'],
      'lastname' => $row['lastname'],
      'suffix' => $row['suffix'],
      'gender' => $row['gender'],
      'age' => $row['age'],
      'birthdate' => $row['birthdate'],
      'contact_number' => $row['contact_number'],
      'address' => $row['address'],
      'email' => $row['email'],
      'password' => Hash::make($row['school_id']),
  ]);

  $user->save(); // Save the user to obtain the ID

  // Create the studentYearLevel relationship
  StudentYearLevel::create([
      'student_id' => $user->id, // Get the user's ID after saving
      'year_level' => $row['year_level'], // Assuming $row[13] contains the year level 
  ]);

   // Assign the 'student' role to the user
   $role = Role::findByName('student');
   $user->assignRole($role);

   return $user;

}
}
