<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run(): void
  {
    if (!Role::where('name', 'teacher')->exists()) {
      Role::create(['name' => 'teacher']);
    }

    if (!Role::where('name', 'student')->exists()) {
      Role::create(['name' => 'student']);
    }

    if (!Role::where('name', 'admin')->exists()) {
      Role::create(['name' => 'admin']);
    }

    if (!User::where('email', 'agvtfi@email.com')->first()) {
      $user = User::create([
        'school_id' => '00000',
        'firstname' => 'Admin',
        'middlename' => 'Admin',
        'lastname' => 'Admin',
        'gender' => 'Female',
        'age' => '18',
        'birthdate' => '1999-01-01',
        'contact_number' => '09123456789',
        'address' => 'Zone 5, Bulan, Sorsogoon',
        'email' => 'agvtfi@email.com',
        'password' => Hash::make('agvtfi54321'),
      ]);
      $user->assignRole('admin');
    }

    if (!User::where('email', 'teacher@agvtfi.com')->first()) {
      $user = User::create([
        'school_id' => '00001',
        'firstname' => 'Anna',
        'middlename' => 'B',
        'lastname' => 'Manalastas',
        'gender' => 'Female',
        'age' => '18',
        'birthdate' => '1999-01-01',
        'contact_number' => '09123456789',
        'address' => 'Zone 5, Bulan, Sorsogoon',
        'email' => 'teacher@agvtfi.com',
        'password' => Hash::make('agvtfi54321'),
      ]);
      $user->assignRole('teacher');
    }

    if (!User::where('email', 'student@agvtfi.com')->first()) {
      $user = User::create([
        'school_id' => '00002',
        'firstname' => 'Juan',
        'middlename' => 'D',
        'age' => '18',
        'lastname' => 'Cruz',
        'gender' => 'Male',
        'birthdate' => '1999-01-01',
        'contact_number' => '09123456789',
        'address' => 'Zone 5, Bulan, Sorsogoon',
        'email' => 'student@agvtfi.com',
        'password' => Hash::make('agvtfi54321'),
      ]);
      $user->assignRole('student');
    }
  }
}
