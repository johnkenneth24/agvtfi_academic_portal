<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserListcontroller extends Controller
{
    public function index()
    {
      return view('modules.user-list.index');
    }
}
