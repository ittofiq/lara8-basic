<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MultiPicture;
use Image;
use Auth;

class MultiPictureController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function allMultiImage()
    {
    	$pictures = MultiPicture::latest()->paginate(12);
    	return view('admin.multipicture.index', compact('pictures'));
    }

    public function addMultiImage(MultiPicture $picture, Request $request)
    {
    	$validatedData = $request->validate([
    		'image' => 'bail|required'
    	], 
    	[
    		'image.required' => 'Please select picture'
    	]);

    	$images = $request->file('image');

    	foreach ($images as $key => $image) {
    		$imageGen = hexdec(uniqid());
	    	$imageExt = strtolower($image->getClientOriginalExtension());
	    	$imageName = $imageGen.'.'.$imageExt;
	    	$imageStorage = 'image/multi/';
	    	$imageLink = $imageStorage.$imageName;

	    	// $image->move($imageStorage, $imageName);

	    	Image::make($image)->resize(300, 200)->save($imageLink);

	    	$picture->insert([
	    		'image' => $imageLink,
	    		'created_at' => Carbon::now(),
	    	]);
    	}

    	return redirect()->back()->with('success', 'Picture inserted successfully');
    }
}
