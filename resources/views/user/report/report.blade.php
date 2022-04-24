@extends('user.layouts.mainAlt')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/staff">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark" aria-current="page">
      Stock Report
  </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-white">Stock Report</h1>
</div>

<!-- Content Row -->
<div class="row">
  <div class="content-cta mb-3">
    <form action="/staff/report/daily" method="POST">
      @csrf
      <div class="row justify-content-end">
        <div class="col-12 d-flex justify-content-start">
          <input type="text" id="datepicker" value="{{ $day }}" name="date">
          <button type="submit" class="btn btn-primary bg-darkblue ml-3 px-4">
            Show
          </button>
          <a href="#" class="btn btn-primary bg-darkblue ml-3 px-4" onclick="tablesToExcel(['dataTable'], ['Stock'], 'stock.xls', 'Excel')">
            Export
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Latest's input</h6>
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
            <th>Transact Code</th>
            <th>Date</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Transact Code</th>
            <th>Date</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Value</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($dataStocks as $stock)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stock->stock_code }}</td>
            <td>{{ $stock->date }}</td>
            <td>{{ $stock->category }}</td>
            <td>{{ $stock->product->subcategory->subcategory_name }}</td>
            <td>{{ $stock->product->product_name }}</td>
            <td>{{ $stock->product->unit->unit_symbol }}</td>
            <td>{{ number_format($stock->quantity, 0)}}</td>
            <td>Rp. {{ number_format($stock->product->unit_price, 2) }}</td>
            <td>Rp. {{ number_format($stock->value, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ URL::to('js/exportExcel/export.js') }}"></script>
@endsection



