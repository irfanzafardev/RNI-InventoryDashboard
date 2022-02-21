@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Stok In List</h1>
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
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    <a href="/administrator/stockin/create" class="btn btn-primary bg-darkblue px-4 mb-3">
      Add Data
    </a>
    {{-- <a href="/administrator/detailstockin/{{ $last->id }}" class="btn btn-primary bg-darkblue px-4 mb-3">
      Show Last Data
    </a> --}}
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
            <th>Transact Code</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Transact Code</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($stockins as $stockin)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stockin->transact_code }}</td>
            <td>{{ $stockin->date }}</td>
            <td>{{ $stockin->product->product_name }}</td>
            <td>{{ $stockin->product->unit->unit_symbol }}</td>
            <td>{{ number_format($stockin->quantity, 0)}}</td>
            <td>Rp. {{ number_format($stockin->product->unit_price, 2) }}</td>
            @php
              $value = $stockin->quantity * $stockin->product->unit_price ;
            @endphp
            <td>Rp.  <?php echo number_format($value, 2); ?> </td>
            <td>
              {{-- <form method="post" action="/administrator/increasestockin/{{ $stockin->id }}">
                @csrf
                <button type="submit" class="btn-link border-0">
                  Transfer Data
                </button>
              </form>     --}}
              <a href="/administrator/products/{{ $stockin->id }}/edit">Edit</a>
              <a href="#" class="deleteStockIn" data-id="{{ $stockin->id }}" data-name="{{ $stockin->product->product_name }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('.deleteStockIn').click( function(){
      var stockinid = $(this).attr('data-id')
      var stockinname = $(this).attr('data-name')
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this heheheheheh "+stockinname+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/administrator/deletestockin/"+stockinid+""
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