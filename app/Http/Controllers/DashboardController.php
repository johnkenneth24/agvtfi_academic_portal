<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;

class DashboardController extends Controller
{
    public function dashboard()
    {
      $anns = announcement::orderBy('date', 'desc')
      ->get();

      return view('modules.dashboard', compact('anns'));
    }
}
