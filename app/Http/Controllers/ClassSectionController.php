<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassAdvisory;

class ClassSectionController extends Controller
{
  public function index()
  {
    $classes = ClassAdvisory::all();

    return view('modules.class-section.index', compact('classes'));
  }
}
