<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('modules.profile.index', compact('user', 'profile'));
    }

    public function changePass(Request $request, User $user)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check old password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Password changed successfully');
    }

    public function changeProfile(Request $request)
    {
        $validated = $request->validate([
            'image' =>  ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
        ]);

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        // dd($validated);

        if ($profile) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = uniqid() . '.' . $ext;

                // if images/user-upload does not exist, create it and move image into that folder
                if (!is_dir(public_path('images/user-upload'))) {
                    mkdir(public_path('images/user-upload'), 0777, true);
                }

                $image->move(public_path('images/user-upload'), $imageName);

                if (file_exists(public_path('images/user-upload/' . $profile->image))) {
                    unlink(public_path('images/user-upload/' . $profile->image));
                }
            }
            $profile->update([
                'image' => $imageName,
            ]);
        } else {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = uniqid() . '.' . $ext;

                // if images/user-upload does not exist, create it and move image into that folder
                if (!is_dir(public_path('images/user-upload'))) {
                    mkdir(public_path('images/user-upload'), 0777, true);
                }

                $image->move(public_path('images/user-upload'), $imageName);
            }

            Profile::create([
                'user_id' => auth()->user()->id,
                'image' => $imageName,
            ]);
        }


        return redirect()->back()->with('success', 'Profile Picture changed successfully!');
    }
}
