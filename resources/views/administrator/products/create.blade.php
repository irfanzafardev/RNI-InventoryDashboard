@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Product Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-6">
    <form method="post" action="/administrator/products">
      @csrf
      <div class="mb-3">
        <label for="product_code" class="form-label">Product Code</label>
        <input
          type="text"
          class="form-control @error('product_code') is-invalid @enderror"
          name="product_code"
          id="product_code"
          value="{{ old('product_code') }}"
        />
        @error('product_code')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input
          type="text"
          class="form-control @error('product_name') is-invalid @enderror"
          name="product_name"
          id="product_name"
          value="{{ old('product_name') }}"
        />
        @error('product_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <select
          name="user_id"
          class="form-select"
          required>
          <option selected>Choose Company</option>
          @foreach ($companies as $company)
            @if (old('company_id') == $company->id)
              <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option>
            @else
              <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3 form-group">
        <label for="product_class" class="form-label">Product Class</label>
        <select
          name="group_id"
          class="form-control form-select"
          id="mark">
          <option value="">Choose Class</option>
          @foreach ($groups as $group)
          <option value="{{ $group->id }}">{{ $group->group_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 form-group">
        <label for="product_category" class="form-label"
          >Product Category</label
        >
        <select
          name="category_id"
          class="form-control form-select"
          aria-label="Default select example"
          id="series"
        >
          <option value="">Choose Category</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" data-chained="{{ $category->group_id }}">{{ $category->category_name }}</option>
            {{-- @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" data-chained="{{ $category->id }}" selected="selected">{{ $category->category_name }}</option>
            @else
              <option value="{{ $category->id }}" data-chained="{{ $category->id }}">{{ $category->category_name }}</option>
            @endif --}}
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="subproduct_category" class="form-label"
          >Subproduct Category</label
        >
        <select
          name="subcategory_id"
          class="form-select"
          id="subproduct_category"
          aria-label="Default select example"
        >
          <option selected>Choose Subcategory</option>
          @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>

            {{-- @if (old('subcategory_id') == $subcategory->id)
              <option value="{{ $subcategory->id }}" selected>{{ $subcategory->subcategory_name }}</option>
            @else
              <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
            @endif --}}
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="product_unit" class="form-label"
          >Product Unit</label
        >
        <select
          name="unit_id"
          class="form-select"
          id="product_unit"
          aria-label="Default select example"
        >
          <option selected>Choose Unit</option>
          @foreach ($units as $unit)
            @if (old('unit_id') == $unit->id)
              <option value="{{ $unit->id }}" selected>{{ $unit->unit_name }}</option>
            @else
              <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input
          type="number"
          class="input form-control @error('quantity') is-invalid @enderror"
          name="quantity"
          id="quantity"
        />
        @error('quantity')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="unit_price" class="form-label">Unit Price</label>
        <input
          type="number"
          class="input form-control @error('unit_price') is-invalid @enderror"
          name="unit_price"
          id="unit_price"
        />
        @error('unit_price')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="value" class="form-label">Value</label>
        <input
          type="number"
          class="form-control @error('unit_price') is-invalid @enderror"
          name="value"
          id="value"
        />
        @error('value')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary bg-darkblue"
        >Submit</button
      >
    </form>
  </div>
</div>

@endsection