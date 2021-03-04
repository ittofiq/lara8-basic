@extends('layouts.admin.master')

@section('content')
<div class="content-wrapper">
  <div class="content">
    <div class="py-12">
      <div class="container">
        <div class="row">
          <div class="col-12">
            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="card card-default">
              <div class="card-header card-header-border-bottom">
                <h5>All Slider</h5>
                <a href="{{ route('create.slider') }}" class="btn btn-sm btn-primary ml-auto">Add</a>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="15%">Title</th>
                    <th scope="col" width="25%">Description</th>
                    <th scope="col" width="10%">Image</th>
                    <th scope="col" width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $key => $slider)
                  <tr>
                    <!-- 
                      <td>{{ $sliders->firstItem() + $loop->index }}</td>
                    -->
                    <td>{{ $sliders->firstItem() + $key }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td><img src="{{ asset($slider->image) }}" style="width: 70px; height: 40px;"></td>
                    <td class="float-right">
                      <a href="{{ url('slider/delete/'.$slider->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                      <a href="{{ route('edit.slider', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
              <div class="card-footer">
                {{ $sliders->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection