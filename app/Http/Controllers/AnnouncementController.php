<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
      $announcement = announcement::orderBy("date","desc")->paginate(10);



      return view('modules.announcement.index', compact('announcement'));
    }

    public function create()
    {

      return view('modules.announcement.create');
    }

    public function edit(announcement $ann)
    {

      return view('modules.announcement.edit', compact('ann'));
    }

    public function view(announcement $ann)
    {

      return view('modules.announcement.view', compact('ann'));
    }

    public function store(Request $request)
    {
      $validated = $request->validate([
        'subject' => 'required',
        'date' => 'required',
        'description' => 'required',
      ]);

      announcement::create($validated);

      return redirect()->route('announcement.index')->with('success','Announcement successfully publish!');
    }

    public function update(Request $request, announcement $ann)
    {
      $validated = $request->validate([
        'subject' => 'required',
        'date' => 'required',
        'description' => 'required',
      ]);

      $ann->update([
        'subject'=> $validated['subject'],
        'date'=> $validated['date'],
        'description'=> $validated['description'],
      ]);
      return redirect()->route('announcement.index')->with('success','Announcement successfully publish!');
    }

    public function delete(announcement $ann)
  {
    $ann->delete();

    return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully!');

  }
}
