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
      Product Items
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Product List</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Product</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/staff/products/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th>Product Code</th>
            <th>Company</th>
            <th>Product Name</th>
            <th>Class</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>UOM</th>
            <th>Unit Price</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Product Code</th>
            <th>Company</th>
            <th>Product Name</th>
            <th>Class</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>UOM</th>
            <th>Unit Price</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($dataproduct as $product)
          <tr class="" id="trow-{{ $product->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->user->company->company_name }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->subcategory->category->group->group_name }}</td>
            <td>{{ $product->subcategory->category->category_name }}</td>
            <td>{{ $product->subcategory->subcategory_name }}</td>
            <td>{{ $product->unit->unit_name}}</td>
            <td>Rp. {{ number_format($product->unit_price, 2) }}</td>
            @php
              $value = $product->quantity * $product->unit_price ;
            @endphp
            {{-- <td>Rp. <?php echo number_format($value, 0); ?></td> --}}
            {{-- <td>{{ $product->created_at }}</td> --}}
            <td>
              <a href="/staff/products/{{ $product->id }}/edit">Edit</a>
              <a href="#" class="deleteProduct" data-id="{{ $product->id }}" data-name="{{ $product->product_name }}">Delete</a>
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('.deleteProduct').click( function(){
    var productid = $(this).attr('data-id')
    var productname = $(this).attr('data-name')
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this "+productname+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/staff/deleteproduct/"+productid+""
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



