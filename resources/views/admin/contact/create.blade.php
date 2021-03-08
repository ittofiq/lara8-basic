@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
	<div class="content">
	  	<div class="col-8 m-auto">
	  		<div class="card card-default">
	  			<div class="card-header card-header-border-bottom">
			    	<h5>Add Contact</h5>
			    </div>
			  	<div class="card-body">
				    <form action="{{ route('store.contact') }}" method="POST">
				      @csrf
				      <div class="form-group">
				        <label for="email">Email</label>
				        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
				        @error('email')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="phone">Phone</label>
				        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
				        @error('phone')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="address">Address</label>
				        <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
				        @error('address')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <button type="submit" class="btn btn-primary float-right">Add</button>
				    </form>
				</div>
			</div>
		</div>
   	</div>
</div>
@endsection