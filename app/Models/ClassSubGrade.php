<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubGrade extends Model
{
    use HasFactory;

    protected $fillable = [
      'class_advisory_id',
      'class_sub_id',
      'student_id',
      'semester',
      'gradeLevel',
      'first_grading',
      'second_grading',
      'third_grading',
      'fourth_grading',
    ];




    public function classSubjectStudent()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function classAdvisory()
    {
      return $this->belongsTo(ClassAdvisory::class, 'class_advisory_id');
    }

    public function classSubject()
    {
      return $this->belongsTo(ClassSubject::class,'class_sub_id');
    }


}
