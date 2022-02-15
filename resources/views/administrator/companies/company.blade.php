@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Company List</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Today's input</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/administrator/products/create" class="btn btn-primary bg-darkblue px-4 mb-3">
      Add Data
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
            <th>Company</th>
            <th>Product Class</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Product Class</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($companies as $company)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->group->group_name }}</td>
            <td>
              <a href="/administrator/products/{{ $company->id }}/edit">Edit</a>
              <a href="#" class="delete" data-id="{{ $company->id }}" data-name="{{ $company->company }}">Delete</a>
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection