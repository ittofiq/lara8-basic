@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
	<div class="content">
	  	<div class="col-8 m-auto">
	  		<div class="card card-default">
	  			<div class="card-header card-header-border-bottom">
			    	<h5>Add Slider</h5>
			    </div>
			  	<div class="card-body">
				    <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
				      @csrf
				      <div class="form-group">
				        <label for="title">Title</label>
				        <input type="text" name="title" id="title" class="form-control">
				        @error('title')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="description">Description</label>
				        <textarea name="description" id="description" class="form-control"></textarea>
				        @error('description')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="image">Image</label>
				        <input type="file" name="image" id="image" class="form-control">
				        @error('image')
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