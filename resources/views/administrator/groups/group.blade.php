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
      Product Class
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Class List</h1>
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
    <a href="/administrator/classes/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th>Product Class</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Product Class</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($groups as $group)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $group->group_name }}</td>
            <td class="text-center">
              <a href="/administrator/classes/{{ $group->id }}/edit">Edit</a>
              <a href="#" class="delete" data-id="{{ $group->id }}" data-name="{{ $group->group_name }}">Delete</a>
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
    var groupId = $(this).attr('data-id')
    var groupName = $(this).attr('data-name')
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover "+groupName+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/administrator/removegroup/"+groupId+""
        swal("Data has been removed!", {
          icon: "success",
        });
      } else {
        swal("Your file is safe!");
      }
    });
  })
</script>
@endsection