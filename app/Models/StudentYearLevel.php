<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentYearLevel extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'year_level',
      'status',
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'student_id');
    }
}
