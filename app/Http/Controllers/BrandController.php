<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' =>  'required|mimes:jpg,jpeg,png'
        ], [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand Longer Than 4 Character'
        ]);

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

        $last_img = 'image/brand/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Brand Inserted Successfully');
    }

    public function Edit($id)
    {
        if (isset($id)) {
            $brand = Brand::find($id);
            return view('admin.brand.edit', [
                'brand' => $brand
            ]);
        } else {
            return redirect()->route('all.brand')->with('error', 'Missing required parameter');
        }
    }

    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
        ], [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand Longer Than 4 Character'
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Brand Updated Successfully');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return redirect()->back()->with('success', 'Brand Updated Successfully');
        }
    }

    public function Delete($id)
    {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }

    // Multi Image
    public function Multpic()
    {
        $images = Multipic::all();
        return view('admin.multpic.index', [
            'images' => $images
        ]);
    }

    public function StoreImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);

        $images = $request->file('image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('image/multi/' . $name_gen);

            $last_img = 'image/multi/' . $name_gen;

            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success', 'Brand Inserted Successfully');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout');
    }
}
