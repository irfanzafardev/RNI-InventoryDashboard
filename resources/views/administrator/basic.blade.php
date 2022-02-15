@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Basic Data</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">All Data</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/basicform" class="btn btn-primary bg-darkblue px-4 mb-3">
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
            <th>Company</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price (Rp)</th>
            <th>Value (Rp)</th>
            <th>Data & Time</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Company</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Product Name</th>
            <th>UOM</th>
            <th>Qty</th>
            <th>Unit Price (Rp)</th>
            <th>Value (Rp)</th>
            <th>Tanggal</th>
            <th>Option</th>
          </tr>
        </tfoot>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($databasic as $row)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->company }}</td>
            <td>{{ $row->category_name }}</td>
            <td>{{ $row->subcategory_name }}</td>
            <td>{{ $row->product_name }}</td>
            <td>{{ $row->unit_name }}</td>
            <td>{{ $row->quantity }}</td>
            <td>{{ $row->unit_price }}</td>
            <td>{{ $row->value }}</td>
            <td>{{ $row->created_at->diffForHumans() }}</td> {{-- format('D M Y') --}}
            <td>
              <a href="/viewbasic/{{ $row->id }}">Edit</a>
              <a href="#" class="" data-id="{{ $row->id }}" data-name="{{ $row->product_name }}">Delete</a>
              {{-- /deletebasic/{{ $row->id }} --}}
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

