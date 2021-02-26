<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Auth;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function allBrand()
    {
    	$brands = Brand::latest()->paginate(5);
    	return view('admin.brand.index', compact('brands'));
    }

    public function addBrand(Brand $brand, Request $request)
    {
    	$validatedData = $request->validate([
    		'name' => 'bail|required|unique:brands|min:3',
    		'image' => 'required|mimes:jpg,jpeg,png'
    	], 
    	[
    		'name.required' => 'Please input Brand Name',
    		'name.min' => 'Brand Name Min 3 chars'
    	]);

    	$image = $request->file('image');
    	$imageGen = hexdec(uniqid());
    	$imageExt = strtolower($image->getClientOriginalExtension());
    	$imageName = $imageGen.'.'.$imageExt;
    	$imageStorage = 'image/brand/';
    	$imageLink = $imageStorage.$imageName;

    	// $image->move($imageStorage, $imageName);

    	Image::make($image)->resize(300, 200)->save($imageLink);

    	$brand->insert([
    		'name' => $request->name,
    		'image' => $imageLink,
    		'created_at' => Carbon::now(),
    	]);

    	return redirect()->back()->with('success', 'Brand inserted successfully');
    }

    public function editBrand($id)
    {
    	$brand = Brand::find($id);
    	return view('admin.brand.edit', compact('brand'));
    }

    public function updateBrand(Request $request, $id)
    {
    	$validatedData = $request->validate([
    		'name' => 'bail|required|min:3'
    	], 
    	[
    		'name.required' => 'Please input Brand Name',
    		'name.min' => 'Brand Name Min 3 chars'
    	]);

    	$imageOld = $request->oldImage;
    	$image = $request->file('image');

    	if ($image) {
    		unlink($imageOld);
    		
    		$imageGen = hexdec(uniqid());
	    	$imageExt = strtolower($image->getClientOriginalExtension());
	    	$imageName = $imageGen.'.'.$imageExt;
	    	$imageStorage = 'image/brand/';
	    	$imageLink = $imageStorage.$imageName;

	    	// $image->move($imageStorage, $imageName);

	    	Image::make($image)->resize(300, 200)->save($imageLink);

		    Brand::find($id)->update([
	    		'name' => $request->name,
	    		'image' => $imageLink,
	    		'updated_at' => Carbon::now(),
	    	]);
    	}else {
	    	Brand::find($id)->update([
	    		'name' => $request->name,
	    		'updated_at' => Carbon::now(),
	    	]);
    	}

    	return redirect()->route('all.brand')->with('success', 'Brand updated successfully');
    }

    public function deleteBrand($id)
    {
    	$brand = Brand::find($id);
    	$imageLink = $brand->image;
    	unlink($imageLink);

    	$brand->delete();

    	return redirect()->route('all.brand')->with('success', 'Brand deleted successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User logout');
    }
}
