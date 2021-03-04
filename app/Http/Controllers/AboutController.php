<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\About;
use Auth;
use Image;

class AboutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function allAbout()
    {
    	$abouts = About::latest()->paginate(5);
    	return view('admin.about.index', compact('abouts'));
    }

    public function createAbout()
    {
    	return view('admin.about.create');
    }

    public function storeAbout(Request $request)
    {
    	$validateData = $request->validate([
    		'title' => 'required',
    		'info' => 'required',
    		'description' => 'required'
    	], [
    		'title.required' => 'title required',
    		'info.required' => 'info required',
    		'description.required' => 'description required'
    	]);

    	About::insert([
    		'title' => $request->title,
    		'info' => $request->info,
    		'description' => $request->description,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->route('all.about')->with('success', 'About inserted successfully');
    }

    public function editAbout($id)
    {
    	$about = About::find($id);
    	return view('admin.about.edit', compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
    	$validateData = $request->validate([
    		'title' => 'required',
    		'info' => 'required',
    		'description' => 'required'
    	], [
    		'title.required' => 'title required',
    		'info.required' => 'info required',
    		'description.required' => 'description required'
    	]);

    	About::find($id)->update([
    		'title' => $request->title,
    		'info' => $request->info,
    		'description' => $request->description,
    		'updated_at' => Carbon::now()
    	]);

    	return redirect()->route('all.about')->with('success', 'About updated successfully');
    }

    public function deleteAbout($id)
    {
    	About::find($id)->delete();
    	return redirect()->back()->with('success', 'About deleted successfully');
    }
}
