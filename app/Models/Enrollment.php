<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
      'subject',
      'start',
      'end'
    ];

    protected $casts = [
      'start' => 'datetime:Y-m-d',
      'end' => 'datetime:Y-m-d'
    ];
}
