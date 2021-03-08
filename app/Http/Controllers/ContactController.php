<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contact;
use Auth;

class ContactController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	return view('contact');
    }

    public function allContact()
    {
    	$contacts = Contact::latest()->paginate(5);
    	return view('admin.contact.index', compact('contacts'));
    }

    public function createContact()
    {
    	return view('admin.contact.create');
    }

    public function storeContact(Request $request)
    {
    	$validatedData = $request->validate([
    		'email' => 'bail|required',
    		'phone' => 'required',
    		'address' => 'required'
    	], [
    		'email.required' => 'Please input Email',
    		'phone.required' => 'Please input Phone number',
    		'address.required' => 'Please input valid Address'
    	]);

    	Contact::insert([
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->route('all.contact')->with('success', 'Contact inserted successfully');
    }

    public function editContact($id)
    {
    	$contact = Contact::find($id);
    	return view('admin.contact.edit', compact('contact'));
    }

    public function updateContact(Request $request, $id)
    {
    	$validatedData = $request->validate([
    		'email' => 'bail|required',
    		'phone' => 'required',
    		'address' => 'required'
    	], [
    		'email.required' => 'Please input Email',
    		'phone.required' => 'Please input Phone number',
    		'address.required' => 'Please input valid Address'
    	]);

    	Contact::find($id)->update([
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'address' => $request->address,
    		'updated_at' => Carbon::now()
    	]);

    	return redirect()->route('all.contact')->with('success', 'Contact updated successfully');
    }

    public function deleteContact($id)
    {
    	Contact::find($id)->delete();
    	return redirect()->back()->with('success', 'Contact deleted successfully');
    }
}
