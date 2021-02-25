<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Multi Picture
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
          <div class="card-group">
            @foreach($pictures as $key => $picture)
              <div class="col-md-4 mt-5">
                <div class="card">
                  <img src="{{ asset($picture->image) }}">
                </div>
              </div>
            @endforeach
            <div class="col-12 mt-5">
              {{ $pictures->links() }}
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h5>Multi Picture</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('store.multiImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="image">Picture</label>
                  <input type="file" name="image[]" id="image" class="form-control" multiple="multiple">
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
