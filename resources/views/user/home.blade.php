@extends('user.layouts.main')

@section('breadcrumb')
{{-- {{ $today }}, {{ $now }} --}}
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
  <h1 class="h3 mb-0">Dashboard</h1>
</div>

<div class="d-none">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
  
  <div class="alert alert-primary d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
    <div>
      Lorem ipsum dolor sir amet
    </div>
  </div>
  
  <div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      An example warning alert with an icon
    </div>
  </div>
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
             {{ $dataProduct }} <span>products</span>
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
            @foreach ($dataStock as $stock)
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
                <a href="#" class="deleteStockIn" data-id="{{ $stock->id }}" data-name="{{ $stock->product->product_name }}">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection



