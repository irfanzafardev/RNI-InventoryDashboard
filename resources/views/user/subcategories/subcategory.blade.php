@extends('user.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/staff">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      Subcategory
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Subcategory List</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Subcategory</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/staff/subcategories/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th class="col-1">No</th>
            <th>Product Subcategory</th>
            <th>Product Category</th>
            <th>Product Class</th>
            <th class="d-none">Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Product Subcategory</th>
            <th>Product Category</th>
            <th>Product Class</th>
            <th class="d-none">Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($dataSubcategory as $subcategory)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subcategory->subcategory_name }}</td>
            <td>{{ $subcategory->category->category_name }}</td>
            <td>{{ $subcategory->category->group->group_name }}</td>
            <td class="text-center d-none">
              <a href="/staff/subcategories/{{ $subcategory->id }}/edit">Edit</a>
              <a href="#" class="delete d-none" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->subcategroy_name }}">Delete</a>
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection