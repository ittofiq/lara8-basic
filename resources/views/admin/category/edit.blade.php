<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header">
                    <h5>Edit Category</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
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
