<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDocument;

class RequestDocController extends Controller
{
    public function index()
    {
      $reqs = RequestDocument::where('student_id', auth()->user()->id)
      ->orderBy('created_at', 'desc')->get();

      return view('modules.request-doc.index', compact('reqs'));
    }

    public function storeRequest(Request $request)
    {
      $validate = $request->validate([
        'subject' => 'required'
      ]);

      RequestDocument::create([
        'student_id' => auth()->user()->id,
        'subject' => $validate['subject'],
        'status' => 'Pending'
      ]);

      return redirect()->route('reqdoc.index')->with('success', 'Successfully requested!');

    }
}
