@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Stock In Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/stockin">
      @csrf
      <div class="row">
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="transact_code" class="form-label">Transact Code</label>
            <input
              type="text"
              class="form-control @error('transact_code') is-invalid @enderror"
              name="transact_code"
              id="transact_code"
              value="{{ $code }}"
              readonly
            />
            @error('transact_code')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="date" class="form-label">Date</label>
            <input
              type="date"
              class="form-control @error('date') is-invalid @enderror"
              name="date"
              id="date"
            />
            @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="product_id" class="form-label"
              >Product Name</label
            >
            <select
              name="product_id"
              class="form-select">
              <option selected>Choose Product</option>
              @foreach ($products as $product)
                @if (old('product_id') == $product->id)
                  <option value="{{ $product->id }}" selected>{{ $product->product_name }}</option>
                @else
                  <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="group_name" class="form-label">Product Class</label>
            <input type="text" class="form-control @error('group_name') is-invalid @enderror" name="group_name" id="group_name" readonly/>
              @error('group_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
        </div>
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="category_name" class="form-label">Product Category</label>
            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" readonly/>
            @error('category_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="subcategory_name" class="form-label">Sub Product Category</label>
            <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" id="subcategory_name" readonly />
            @error('subcategory_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="unit_price" class="form-label">Unit Price</label>
            <input type="number" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" id="unit_price" readonly/>
            @error('unit_price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="input form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" />
            @error('quantity')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Submit</button>
          <a href="/administrator/stockin" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection