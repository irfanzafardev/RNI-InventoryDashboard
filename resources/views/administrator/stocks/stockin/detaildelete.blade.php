@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Delete Stock In Form</h1>
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
    <div class="table-responsive">
      <table
        class="table table-bordered"
        {{-- id="dataTable" --}}
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
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td>1</td>
            <td>{{ $deleteddata->transact_code }}</td>
            <td>{{ $deleteddata->date }}</td>
            <td>{{ $deleteddata->product->product_name }}</td>
            <td>{{ $deleteddata->product->unit->unit_symbol }}</td>
            <td>{{ number_format($deleteddata->quantity, 0)}}</td>
            <td>Rp. {{ number_format($deleteddata->product->unit_price, 2) }}</td>
            @php
              $value = $deleteddata->quantity * $deleteddata->product->unit_price ;
            @endphp
            <td>Rp.  <?php echo number_format($value, 2); ?> </td>
          </tr>
        </tbody>
        <form method="post" action="/administrator/increasestockin/{{ $deleteddata->id }}">
          @csrf
          <button type="submit" class="btn btn-primary bg-darkblue mb-3 float-end border-0">
            Transfer Data
          </button>
        </form>    
      </table>
    </div>
  </div>
</div>

@endsection