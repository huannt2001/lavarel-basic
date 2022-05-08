<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function ChangePass() {
        return view('admin.body.change_password');
    }

    public function UpdatePass(Request $request) {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Change Successfully');
        } else {
            return redirect()->back()->with('error','Current Password Is Invalid');
        }
    }

    public function ProfileUpdate() {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function UserUpdateProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();
            return redirect()->back()->with('success', 'User Profile Updated Is Successfully');
        } else {
            return redirect()->back();
        }
    }
}
