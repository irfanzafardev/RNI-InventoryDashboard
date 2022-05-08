@extends('administrator.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
        Dashboard
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0">Master Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
   <!-- Single-card -->
   <div class="col-xl-4 col-md-6 col-12 mb-4">
    <div class="card panel-single-card h-100 py-1">
      <div class="card-body">
        <div class="row no-gutters">
          <div class="col mr-2">
            <div class="h5 text-white mb-1">
              Today's Value
            </div>
            <div class="h6 mb-0 font-weight-light text-white">
              Rp. {{ number_format($dataValue, 2) }}
            </div>
          </div>
          <div class="col-auto">
            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Single-card -->
  <div class="col-xl-4 col-md-6 col-12 mb-4">
    <div class="card panel-single-card h-100 py-1">
      <div class="card-body">
        <div class="row no-gutters">
          <div class="col mr-2">
            <div class="h5 text-white mb-1">Today's Stock</div>
            <div class="h6 mb-0 font-weight-light text-white">
             {{ $dataTotalStock }} <span>items</span> 
            </div>
          </div>
          <div class="col-auto">
            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Single-card -->
  <div class="col-xl-4 col-md-6 col-12 mb-4">
    <div class="card panel-single-card h-100 py-1">
      <div class="card-body">
        <div class="row no-gutters">
          <div class="col mr-2">
            <div class="h5 text-white mb-1">Total Products</div>
            <div class="h6 mb-0 font-weight-light text-white">
              {{ $dataProduct }} <span>items</span>
            </div> 
          </div>
          <div class="col-auto">
            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Today's input</h6>
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
    <a href="/administrator/stocks/create" class="btn btn-primary bg-darkblue d-none px-4 mb-3">
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
            <th>Company</th>
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
            <th>Company</th>
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
          @foreach ($dataStock as $stock)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stock->stock_code }}</td>
            <td>{{ $stock->company }}</td>
            <td>{{ $stock->date }}</td>
            <td>{{ $stock->product->product_name }}</td>
            <td>{{ $stock->product->unit->unit_symbol }}</td>
            <td>{{ number_format($stock->quantity, 0)}}</td>
            <td>Rp. {{ number_format($stock->product->unit_price, 2) }}</td>
            <td>Rp. {{ number_format($stock->value, 2) }}</td>
            <td class="d-none">
              <a href="/administrator/products/{{ $stock->id }}/edit">Edit</a>
              <a href="#" class="deleteStockIn text-danger" data-id="{{ $stock->id }}" data-name="{{ $stock->product->product_name }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection



