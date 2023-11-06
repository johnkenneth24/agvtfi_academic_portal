<?php

namespace App\Imports;

use App\Models\StudentYearLevel;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;



class StudentImport implements ToModel
{
  public function model(array $row)
{
    // Convert the Excel date serial number to a human-readable date format
    $dateValue = Carbon::createFromFormat('U', strtotime('1900-01-01') + $row[1] * 24 * 3600);

    $user = new User([
      'school_id' => $row[0],
      'admission_date' => $dateValue->format('Y-m-d'),
      'firstname' => $row[2],
      'middlename' => $row[3],
      'lastname' => $row[4],
      'suffix' => $row[5],
      'gender' => $row[6],
      'age' => $row[7],
      'birthdate' => $row[8],
      'contact_number' => $row[9],
      'address' => $row[10],
      'email' => $row[11],
      'password' => Hash::make($row[12]),
  ]);

  $user->save(); // Save the user to obtain the ID

  // Create the studentYearLevel relationship
  StudentYearLevel::create([
      'student_id' => $user->id, // Get the user's ID after saving
      'year_level' => $row[13], // Assuming $row[13] contains the year level
  ]);

   // Assign the 'student' role to the user
   $role = Role::findByName('student');
   $user->assignRole($role);

   return $user;

}
}
