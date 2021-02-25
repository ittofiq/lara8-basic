<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      All Brand
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="container">
      <div class="row">
        <div class="col-8">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h5>All Brand</h5>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Image</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $key => $brand)
                <tr>
                  <!-- 
                    <td>{{ $brands->firstItem() + $loop->index }}</td>
                  -->
                  <td>{{ $brands->firstItem() + $key }}</td>
                  <td>{{ $brand->name }}</td>
                  <td><img src="{{ asset($brand->image) }}" style="width: 70px; height: 40px;"></td>
                  <td>
                    @if($brand->created_at == NULL)
                      <span class="text-danger">No Data Set</span>
                    @else
                      {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                    <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-warning">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>
            </div>
            <div class="card-footer">
              {{ $brands->links() }}
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h5>Add Brand</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                  @error('name')
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
  </div>
</x-app-layout>
