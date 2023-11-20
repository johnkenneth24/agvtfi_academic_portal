<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListcontroller extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');

    $query = User::whereHas('roles', function ($query) {
      $query->where('name', 'student')->orWhere('name', 'teacher');
    })->orderBy('school_id', 'asc');

    if ($search) {
      $query->where(function ($subQuery) use ($search) {
        $subQuery->where('school_id', 'like', '%' . $search . '%')
          ->orWhere('firstname', 'like', '%' . $search . '%')
          ->orWhere('lastname', 'like', '%' . $search . '%')
          ->orWhere('middlename', 'like', '%' . $search . '%')
          ->orWhere('gender', 'like', '%' . $search . '%');
      });
    }

    $users = $query->paginate(10);


    // $users = User::whereHas('roles', function ($query) {
    //   $query->where('name', 'student')->orWhere('name', 'teacher');
    // })->paginate(10);


    return view('modules.user-list.index', compact('users'));
  }
}
