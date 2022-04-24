@extends('administrator.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
        User
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-white">User Management</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">
      User List
    </h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/register" class="btn btn-primary bg-darkblue px-4 mb-3">
      Register User
    </a>
    <div class="table-responsive">
      <table
        class="table table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Company</th>
            <th>Level</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Company</th>
            <th>Level</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->company->company_name }}</td>
            <td>{{ $user->ModelRole->Role->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>
              <a href="/administrator/users/{{ $user->id }}/edit">Edit</a>
              <a href="#" class="delete" data-id="{{ $user->id }}" data-name="{{ $user->name }}">Delete</a>
            </td>
          </tr>     
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('.delete').click( function(){
    var userId = $(this).attr('data-id')
    var userName = $(this).attr('data-name')
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this "+userName+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/administrator/removeuser/"+userId+""
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your imaginary file is safe!");
      }
    });
  })
</script>
@endsection