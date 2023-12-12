<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;

    protected $fillable = [
      'teacher_id',
      'year_section_id',
      'subject_code',
      'subject_name',
      'semester'
    ];

    public function classAdvisory()
    {
      return $this->belongsTo(ClassAdvisory::class, 'year_section_id');
    }

    public function classSubGrade()
    {
      return $this->belongsToMany(ClassSubGrade::class, 'class_sub_id');
    }

    public function classTeacher()
    {
      return $this->belongsTo(User::class, 'teacher_id');
    }
}
