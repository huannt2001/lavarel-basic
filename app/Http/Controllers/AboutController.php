<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use App\Models\Multipic;

class AboutController extends Controller
{
    //
    public function HomeAbout() {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout() {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'short_description' =>  'required',
            'long_description' =>  'required'
        ], [
            'title.required' => 'Please Input Home About Title',
            'short_description.required' => 'Please Input Home About short description',
            'long_description.required' => 'Please Input Home About long description',
        ]);

        HomeAbout::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('home.about')->with('success', 'Inserted home about successfuly!');
    }

    public function EditAbout($id) {
        if (isset($id)) {
            $about = HomeAbout::find($id);
            return view('admin.home.edit', compact('about'));
        } else {
            return redirect()->route('home.about')->with('error', 'Missing required parameter');
        }
    }

    public function UpdateAbout(Request $request, $id) {
        $about = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('home.about')->with('success', 'Updated Home About Successfully');
    }

    public function DeleteAbout($id) {
        if(isset($id)) {
            $delete = HomeAbout::find($id)->delete();
            return redirect()->back()->with('success', 'Deleted Home About Successfully');
        } else {
            return redirect()->back()->with('error', 'Missing required parameter');
        }
    }

    public function Portfolio() {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
}
