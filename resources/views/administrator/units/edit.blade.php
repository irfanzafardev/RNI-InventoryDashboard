@extends('administrator.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      <a href="/administrator/classes">
        Unit
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      Edit
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Edit UOM Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/classes">
      @csrf
      <div class="row">
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="unit" class="form-label">Unit Name</label>
            <input
              type="text"
              class="form-control @error('unit') is-invalid @enderror"
              name="unit_name"
              id="unit"
              placeholder="Enter unit name"
              value="{{ old('unit_name') }}"
              required
            />
            @error('unit')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="unit_symbol" class="form-label">Unit Symbol</label>
            <input
              type="text"
              class="form-control @error('unit_symbol') is-invalid @enderror"
              name="unit_symbol"
              id="unit_symbol"
              placeholder="Enter unit symbol"
              value="{{ old('unit_symbol') }}"
              required
            />
            @error('unit_symbol')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Submit</button>
          <a href="/administrator/classes" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection