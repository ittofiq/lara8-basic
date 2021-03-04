@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
	<div class="content">
	  	<div class="col-8 m-auto">
	  		<div class="card card-default">
	  			<div class="card-header card-header-border-bottom">
			    	<h5>Edit About</h5>
			    </div>
			  	<div class="card-body">
				    <form action="{{ route('update.about', $about->id) }}" method="POST">
				      @csrf
				      <div class="form-group">
				        <label for="title">Title</label>
				        <input type="text" name="title" id="title" class="form-control" value="{{ $about->title }}">
				        @error('title')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="info">Info</label>
				        <textarea name="info" id="info" class="form-control">{{ $about->info }}</textarea>
				        @error('info')
				          <span class="text-danger">{{ $message }}</span>
				        @enderror
				      </div>
				      <div class="form-group">
				        <label for="description">Description</label>
				        <textarea name="description" id="description" class="form-control">{{ $about->description }}</textarea>
				        @error('description')
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