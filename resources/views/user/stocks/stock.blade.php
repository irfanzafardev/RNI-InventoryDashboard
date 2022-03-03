@extends('user.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Product Stok</h1>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2 px-3 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Today
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2 px-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      All
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
        <a href="/staff/stocks/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
              @foreach ($stocks as $stock)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stock->stock_code }}</td>
                <td>{{ $stock->date }}</td>
                <td>{{ $stock->product->product_name }}</td>
                <td>{{ $stock->product->unit->unit_symbol }}</td>
                <td>{{ number_format($stock->quantity, 0)}}</td>
                <td>Rp. {{ number_format($stock->product->unit_price, 2) }}</td>
                <td>Rp. {{ number_format($stock->value, 2) }}</td>
                <td>
                  <a href="/staff/stocks/{{ $stock->id }}/edit">Edit</a>
                  <a href="#" class="deleteStock" data-id="{{ $stock->id }}" data-name="{{ $stock->product->product_name }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- DataTales All's input -->
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">All input</h6>
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
        <a href="/user/stockin/create" class="btn btn-primary bg-darkblue px-4 mb-3">
          Add Data
        </a>
        <div class="table-responsive">
          <table
            class="table table-bordered display"
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
                <th class="d-none">Option</th>
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
                <th class="d-none">Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($allStocks as $allStock)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $allStock->stock_code }}</td>
                <td>{{ $allStock->date }}</td>
                <td>{{ $allStock->product->product_name }}</td>
                <td>{{ $allStock->product->unit->unit_symbol }}</td>
                <td>{{ number_format($allStock->quantity, 0)}}</td>
                <td>Rp. {{ number_format($allStock->product->unit_price, 2) }}</td>
                <td>Rp. {{ number_format($allStock->value, 2) }}</td>
                <td class="d-none">
                  <a href="/user/stock/{{ $allStock->id }}/edit">Edit</a>
                  <a href="#" class="deleteStockIn" data-id="{{ $allStock->id }}" data-name="{{ $allStock->product->product_name }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('table.display').DataTable();
  });

  $('.deleteStock').click( function(){
      var stockid = $(this).attr('data-id')
      var stockname = $(this).attr('data-name')
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this "+stockname+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/staff/deletestock/"+stockid+""
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