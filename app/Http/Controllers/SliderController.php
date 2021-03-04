<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use Auth;
use Image;

class SliderController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function allSlider()
    {
    	$sliders = Slider::latest()->paginate(5);
    	return view('admin.slider.index', compact('sliders'));
    }

    public function createSlider()
    {
    	return view('admin.slider.create');
    }

    public function storeSlider(Request $request)
    {
    	$validateData = $request->validate([
    		'title' => 'bail|required',
    		'description' => 'required',
    		'image' => 'required'
    	]);

    	$image = $request->file('image');
    	$imageGen = hexdec(uniqid());
    	$imageExt = strtolower($image->getClientOriginalExtension());
    	$imageName = $imageGen.'.'.$imageExt;
    	$imageStorage = 'image/slider/';
    	$imageLink = $imageStorage.$imageName;

    	// $image->move($imageStorage, $imageName);

    	Image::make($image)->resize(1920, 1088)->save($imageLink);

    	Slider::insert([
    		'title' => $request->title,
    		'description' => $request->description,
    		'image' => $imageLink,
    		'created_at' => Carbon::now(),
    	]);

    	return redirect()->route('all.slider')->with('success', 'Slider inserted successfully');
    }
}
