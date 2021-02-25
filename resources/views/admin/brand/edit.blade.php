<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Edit Brand
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h5>Edit Brand</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('update.brand', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="oldImage" value="{{ $brand->image }}">
                <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" id="image" class="form-control" value="{{ $brand->image }}">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <img src="{{ asset($brand->image) }}" style="width: 300px; height: 200px;">
                </div>
                <button type="submit" class="btn btn-warning float-right">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
