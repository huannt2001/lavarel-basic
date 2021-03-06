<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', [
            'categories' => $categories,
            'trashCat' => $trashCat
        ]);
    }

    public function AddCat(Request $request)
    {
        $validatedData  = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ], [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Name Less Than 255 Characters',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    public function Edit($id)
    {
        $category = Category::find($id);
        return view('admin/category/edit', [
            'category' => $category
        ]);
    }

    public function Update(Request $request, $id)
    {
        $category = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success', 'Category Inserted Successfully');
    }

    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted Category Successfully');
    }

    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Restored Category Successfully');
    }

    public function PDelete($id)
    {
        if ($id) {
            $delete = Category::onlyTrashed()->find($id)->forceDelete();
            return redirect()->back()->with('success', 'Category Permanently Deleted');
        } else {
            return redirect()->back()->with('error', 'Missing required parameter');
        }
    }
}
