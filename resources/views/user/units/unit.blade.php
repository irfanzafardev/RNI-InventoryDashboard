@extends('user.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Unit List</h1>
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
            <th>Unit Name</th>
            <th>Unit Symbol</th>
            <th class="d-none">Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Unit Name</th>
            <th>Unit Symbol</th>
            <th class="d-none">Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($units as $unit)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $unit->unit_name }}</td>
            <td>{{ $unit->unit_symbol}}</td>
            <td class="d-none">
              <a href="/administrator/products/{{ $unit->id }}/edit">Edit</a>
              <a href="#" class="delete" data-id="{{ $unit->id }}" data-name="{{ $unit->unit_name }}">Delete</a>
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection