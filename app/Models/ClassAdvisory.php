<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAdvisory extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'teacher_id',
      'academic_year',
      'grade_level',
      'section',
      'status'
    ];

    public function classAdvisoryTeacher()
    {
      return $this->belongsTo(User::class);
    }

    public function classAdvisoryStudent()
    {
      return $this->hasMany(ClassAdvisoryStudent::class, 'class_advisory_id');
    }

}
