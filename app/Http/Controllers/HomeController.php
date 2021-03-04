<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\About;
use App\Models\MultiPicture;

class HomeController extends Controller
{
	public function index()
	{
		$about = About::first();
		$sliders = Slider::latest()->get();
		$brands = Brand::latest()->get();
		$multiImages = MultiPicture::all();
		return view('home', compact('brands', 'sliders', 'about', 'multiImages'));
	}
}
