<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDocument;


class AdminRequestDocController extends Controller
{
    public function index()
    {
      $reqs = RequestDocument::orderBy('created_at', 'desc')->get();

      return view("modules.admin-request-doc.index", compact('reqs'));
    }

    public function upload(RequestDocument $document)
    {
      
    }
}
