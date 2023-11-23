<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  protected $fillable = [
    'school_id',
    'admission_date',
    'suffix',
    'firstname',
    'middlename',
    'lastname',
    'gender',
    'birthdate',
    'age',
    'contact_number',
    'address',
    'email',
    'password',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'birthdate' => 'date',
    'admission_date' => 'date'
  ];

  public function class_adviser()
  {
    return $this->hasMany(ClassAdvisory::class, 'teacher_id');
  }

  public function studentYearLevel()
  {
    return $this->hasMany(StudentYearLevel::class,'student_id');
  }

  public function student()
  {
    return $this->hasMany(ClassAdvisoryStudent::class, 'student_id');
  }

  public function subjectStudent()
  {
    return $this->belongsTo(ClassSubGrade::class,'student_id');
  }

  public function getFullNameAttribute()
  {
    $middleInitial = empty($this->middlename) ? '' : strtoupper(substr($this->middlename, 0, 1));

    return "{$this->firstname} {$middleInitial}. {$this->lastname} {$this->suffix}";
  }

  public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
