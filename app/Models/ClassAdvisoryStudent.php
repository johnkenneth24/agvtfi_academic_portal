<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAdvisoryStudent extends Model
{
    use HasFactory;

    protected $fillable = [
      'class_advisory_id',
      'student_id'
    ];

    public function classAdvisory()
    {
      return $this->belongsTo(ClassAdvisory::class);
    }

    public function classStudent()
    {
      return $this->belongsTo(User::class, 'student_id');
    }

}
