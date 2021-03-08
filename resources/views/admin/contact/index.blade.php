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
                <h5>All Contact</h5>
                <a href="{{ route('create.contact') }}" class="btn btn-sm btn-primary ml-auto">Add</a>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $key => $contact)
                  <tr>
                    <!-- 
                      <td>{{ $contacts->firstItem() + $loop->index }}</td>
                    -->
                    <td>{{ $contacts->firstItem() + $key }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ ($contact->email) }}</td>
                    <td>{{ ($contact->phone) }}</td>
                    <td class="float-right">
                      <a href="{{ url('contact/delete/'.$contact->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                      <a href="{{ route('edit.contact', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
            <div class="pagination pagination-flat pagination-flat-rounded mt-2">
              {{ $contacts->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
