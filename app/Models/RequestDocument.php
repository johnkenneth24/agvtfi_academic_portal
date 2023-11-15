<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDocument extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'subject',
      'status'
    ];

    public function student()
    {
      return $this->belongsTo(User::class, 'student_id');
    }


}
