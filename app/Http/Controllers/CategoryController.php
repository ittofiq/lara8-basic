<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allCategory()
    {
    	// $categories = Category::latest()->paginate(5);
    	// $categories = DB::table('categories')->latest()->paginate(5);

    	$categories = DB::table('categories')
    		->join('users', 'categories.user_id', 'users.id')
    		->select('categories.*', 'users.name as user_name')
    		->latest()->paginate(5);
    	
    	return view('admin.category.index', compact('categories'));
    }

    public function addCategory(Category $category, Request $request)
    {
    	// Nama property di kolom inputan harus sama dengan nama di validasi.
    	$validatedData = $request->validate([
    		'name' => 'required|unique:categories|max:255',
    	],
    	[
    		'name.required' => 'Please input category name',
    		'name.max' => 'Category name Max 255 chars'
    	]);

    	// Nama kolom property di request->name harus sama dengan nama kolom di database.
    	// Cara ini tidak melakukan input automatis untuk kolom timestamps()
    	
    	$category->insert([
    		'user_id' => Auth::user()->id,
    		'name' => $request->name,
    		'created_at' => Carbon::now()
    	]);

		/**
    	Category::insert([
    		'user_id' => Auth::user()->id,
    		'name' => $request->name,
    		'created_at' => Carbon::now()
    	]);
    	*/

    	/**
    	 * [$data insert via array dengan query builder]
    	 * @var array
    	 *

    	$data = array();
    	$data['user_id'] = Auth::user()->id;
    	$data['name'] = $request->name;

    	DB::table('categories')->insert($data);
    	**/

    	/**
    	 * [$addCategory insert dengan cara buat class baru]
    	 * @var Category
    	 * 
    	
    	// Cara ini melakukan input automatis untuk kolom timestamps()

    	$addCategory = new Category;
    	$addCategory->name = $request->name;
    	$addCategory->user_id = Auth::user()->id;
    	$addCategory->save();
    	*/

    	return redirect()->back()->with('success', 'Category inserted successfull');
    }

    public function editCategory($id)
    {
    	// $category = Category::find($id);
        $category = DB::table('categories')->where('id', $id)->first();
    	return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        /**
    	Category::find($id)->update([
    		'name' => $request->name,
    		'user_id' => Auth::user()->id,
    	]);
        **/

        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->where('id', $id)->update($data);

    	return redirect()->route('all.category')->with('success', 'Category updated successfull');
    }
}
