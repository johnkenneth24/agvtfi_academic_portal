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
  ];


  public function getFullNameAttribute()
    {
      $middleInitial = empty($this->middlename) ? '' : strtoupper(substr($this->middlename, 0, 1));

      return "{$this->firstname} {$middleInitial}. {$this->lastname} {$this->suffix}";
    }
}
