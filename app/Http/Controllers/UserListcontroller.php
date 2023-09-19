<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListcontroller extends Controller
{
    public function index()
    {
      $users = User::whereHas('roles', function ($query) {
        $query->where('name', 'student')->orWhere('name', 'teacher');
      })->paginate(10);
 

      return view('modules.user-list.index', compact('users'));
    }
}
