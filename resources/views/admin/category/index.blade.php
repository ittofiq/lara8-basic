<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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
                    <h5>All Category</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $key => $category)
                      <tr>
                        <!-- 
                          <td>{{ $categories->firstItem() + $loop->index }}</td>
                        -->
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>{{ $category->name }}</td>
                        
                        <!-- Eloquent ORM One to One Relationship -->
                        <td>{{ $category->user->name }}</td>
                        
                        <!-- Query Builder join table user
                        <td>{{ $category->user_name }}</td>
                        -->
                        <td>
                          @if($category->created_at == NULL)
                            <span class="text-danger">No Data Set</span>
                          @else
                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('category/softDelete/'.$category->id) }}" class="btn btn-danger">Delete</a>
                          <a href="{{ route('edit.category', $category->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    {{ $categories->links() }}
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    <h5>Add Category</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary float-right">Add</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-8">
                <div class="card">
                  <div class="card-header">
                    <h5>All Trash</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($trashCats as $key => $trashCat)
                      <tr>
                        <!-- 
                          <td>{{ $trashCats->firstItem() + $loop->index }}</td>
                        -->
                        <td>{{ $trashCats->firstItem() + $key }}</td>
                        <td>{{ $trashCat->name }}</td>

                        <!-- Eloquent ORM One to One Relationship -->
                          <td>{{ $category->user->name }}</td>
                        
                        <!-- Query Builder join table user
                        <td>{{ $trashCat->user_name }}</td>
                        -->
                        <td>
                          @if($trashCat->created_at == NULL)
                            <span class="text-danger">No Data Set</span>
                          @else
                            {{ Carbon\Carbon::parse($trashCat->created_at)->diffForHumans() }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('clear.category', $trashCat->id) }}" class="btn btn-dark">Clear</a>
                          <a href="{{ url('category/restore/'.$trashCat->id) }}" class="btn btn-info">Restore</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    {{ $trashCats->links() }}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
