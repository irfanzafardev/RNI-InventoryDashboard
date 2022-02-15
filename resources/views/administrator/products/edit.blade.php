@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Edit Product Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-6">
    <form method="post" action="/administrator/products/{{ $product->id }}">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="product_code" class="form-label">Product Code</label>
        <input
          type="text"
          class="form-control @error('product_code') is-invalid @enderror"
          name="product_code"
          id="product_code"
          value="{{ old('product_code', $product->product_code) }}"
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
          value="{{ old('product_name', $product->product_name) }}"
        />
        @error('product_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      {{-- <div class="mb-3 ni-salah">
        <label for="product_name" class="form-label">user_id</label>
        <input
          type="text"
          class="form-control @error('product_name') is-invalid @enderror"
          name="user_id"
          id="product_name"
          value="{{ old('product_name') }}"
        />
        @error('product_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div> --}}
      <div class="mb-3">
        <label for="company" class="form-label"
          >Company</label
        >
        <select
          name="user_id"
          class="form-select"
        >
          <option selected>Choose Company</option>
          @foreach ($users as $user)
            @if (old('user_id', $product->user_id) == $user->id)
              <option value="{{ $user->id }}" selected>{{ $user->company }}</option>
            @else
              <option value="{{ $user->id }}">{{ $user->company }}</option>
            @endif
          @endforeach
        </select>
      </div>
      {{-- <div class="mb-3 ni-salah">
        <label for="subcategory_id" class="form-label">subcategory_id</label>
        <input
          type="text"
          class="form-control"
          name="subcategory_id"
          id="product_name"
          value="{{ old('subcategory_id') }}"
        />
      </div> --}}
      <div class="mb-3">
        <label for="product_class" class="form-label"
          >Product Class</label
        >
        <select
          name="group_id"
          class="form-select"
          aria-label="Default select example"
        >
          <option selected>Choose Class</option>
          @foreach ($groups as $group)
            @if (old('group_id', $product->subcategory->category->group_id) == $group->id)
              <option value="{{ $group->id }}" selected>{{ $group->group_name }}</option>
            @else
              <option value="{{ $group->id }}">{{ $group->group_name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      {{-- <div class="mb-3 ni-salah">
        <label for="subcategory_id" class="form-label">unit_id</label>
        <input
          type="text"
          class="form-control"
          name="unit_id"
          id="product_name"
          value="{{ old('unit_id') }}"
        />
      </div> --}}
      <div class="mb-3">
        <label for="product_category" class="form-label"
          >Product Category</label
        >
        <select
          name="category_id"
          class="form-select"
          aria-label="Default select example"
        >
          <option selected>Choose Category</option>
          @foreach ($categories as $category)
            @if (old('category_id', $product->subcategory->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endif
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
            @if (old('subcategory_id', $product->subcategory_id) == $subcategory->id)
              <option value="{{ $subcategory->id }}" selected>{{ $subcategory->subcategory_name }}</option>
            @else
              <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
            @endif
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
            @if (old('unit_id', $product->unit_id) == $unit->id)
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
          class="form-control @error('quantity') is-invalid @enderror"
          name="quantity"
          id="quantity"
          value="{{ old('quantity', $product->quantity) }}"
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
          class="form-control @error('unit_price') is-invalid @enderror"
          name="unit_price"
          id="unit_price"
          value="{{ old('unit_price', $product->unit_price) }}"
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
          value="{{ old('value', $product->value) }}"
        />
        @error('value')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary bg-darkblue"
        >Update</button
      >
    </form>
  </div>
</div>
@endsection