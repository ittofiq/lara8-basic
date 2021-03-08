@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
	<div class="content">
	  	<div class="col-8 m-auto">
	  		<div class="card card-default">
	  			<div class="card-header card-header-border-bottom">
			    	<h5>Edit Contact</h5>
			    </div>
			  	<div class="card-body">
				    <form action="{{ route('update.contact', $contact->id) }}" method="POST">
				      @csrf
				      <div class="form-group">
				        <label for="email">Email</label>
				        <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}">
				        @error('email')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="phone">Phone</label>
				        <input name="phone" id="phone" class="form-control" value="{{ $contact->phone }}">
				        @error('phone')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="address">Description</label>
				        <textarea name="address" id="address" class="form-control">{{ $contact->address }}</textarea>
				        @error('address')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <button type="submit" class="btn btn-warning float-right">Edit</button>
				    </form>
				</div>
			</div>
		</div>
   	</div>
</div>
@endsection