<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDocument;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminRequestDocController extends Controller
{
  public function index()
  {
    $reqs = RequestDocument::orderBy('created_at', 'desc')->get();

    return view("modules.admin-request-doc.index", compact('reqs'));
  }

  public function upload(Request $request, RequestDocument $document)
  {
    // Validate incoming request
    $validator = Validator::make($request->all(), [
      'file' => [
        'required',
        'file',
        'mimes:pdf,docx',
      ],
    ]);

    if ($validator->fails()) {
      return redirect()->route('ad-reqdoc.index')->withErrors('Please check your document');
    }

    if ($request->hasFile('file')) {
      $docRequest = $request->file('file');
      $ext = $docRequest->getClientOriginalExtension();
      $docName = $document->student->lastname . '_' . $document->student->firstname . '_' . uniqid() . '.' . $ext;

      // Move the uploaded file to the 'documents' directory
      $docRequest->move(public_path('documents'), $docName);

      // Update the document column in the database
      $document->update([
        'document' => $docName,
        'status' => 'Granted',
      ]);
    }

    return redirect()->route('ad-reqdoc.index')->with('success', 'Granted successfully!');
  }

  public function cancelDoc(RequestDocument $document)
  {
    
  }
}
