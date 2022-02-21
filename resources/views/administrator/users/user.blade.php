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
        User Management
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-white">User Management (IT RNI)</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">
      User List
    </h6>
  </div>
  <div class="card-body">
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
            <td>{{ $user->email }}</td>
            <td>{{ $user->company->company_name }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->phone }}</td>
            <td>
              <a href="">Edit</a>
              <a href="">Delete</a>
            </td>
          </tr>     
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection