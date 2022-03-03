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
<div
  class="page-heading d-sm-flex align-items-center justify-content-between mb-4"
>
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
              Current Value
            </div>
            <div class="h6 mb-0 font-weight-light text-white">
              Rp. 0
              {{-- Rp. {{ number_format(, 2) }} --}}
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
             {{ $dataproduct }} <span>items</span> 
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
            <div class="h5 text-white mb-1">Total Categories</div>
            <div class="h6 mb-0 font-weight-light text-white">
              {{ $datacategory }} <span>categories</span>
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
@endsection



