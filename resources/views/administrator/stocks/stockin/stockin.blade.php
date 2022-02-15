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
    <a href="/administrator/stockin/create" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th>Supplier</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price (Rp)</th>
            <th>Value (Rp)</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Transact Code</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>Supplier</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price (Rp)</th>
            <th>Value (Rp)</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          
          @foreach ($stockins as $stockin)
          @php
              $value = 0

          @endphp
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $stockin->transact_code }}</td>
            <td>{{ $stockin->date }}</td>
            <td>{{ $stockin->product->product_name }}</td>
            <td>{{ $stockin->supplier}}</td>
            <td>{{ $stockin->product->unit->unit_symbol }}</td>
            <td>{{ $stockin->quantity}}</td>
            <td>{{ $stockin->product->unit_price }}</td>
            @php
              $value = $stockin->quantity * $stockin->product->unit_price ;
            @endphp
            <td> <?php echo $value; ?> </td>
            {{-- <td id="value">{{ $stockin->quantity}}*{{ $stockin->product->unit_price }}</td> --}}
            <td>
              <a href="/administrator/products/{{ $stockin->id }}/edit">Edit</a>
              <a href="#" class="delete" data-id="{{ $stockin->id }}" data-name="{{ $stockin->product->product_name }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection