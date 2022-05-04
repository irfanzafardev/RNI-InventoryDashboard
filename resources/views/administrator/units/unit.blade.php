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
      Product UOM
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Product UOM List</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Product UOM List</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/administrator/units/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th>Unit Name</th>
            <th>Unit Symbol</th>
            <th class="text-center">Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Unit Name</th>
            <th>Unit Symbol</th>
            <th class="text-center">Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($units as $unit)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $unit->unit_name }}</td>
            <td>{{ $unit->unit_symbol}}</td>
            <td class="text-center">
              <a href="/administrator/units/{{ $unit->id }}/edit">Edit</a>
              <a href="#" class="delete text-danger" data-id="{{ $unit->id }}" data-name="{{ $unit->unit_name }}">Delete</a>
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
    var unitId = $(this).attr('data-id')
    var unitName = $(this).attr('data-name')
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this "+unitName+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/administrator/removeunit/"+unitId+""
        swal("The data has been removed!", {
          icon: "success",
        });
      } else {
        swal("Your file is safe!");
      }
    });
  })
</script>
@endsection