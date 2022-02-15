@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Update Basic Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-6">
    <form action="/updatebasic/{{ $databasic->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="product_code" class="form-label">product_code</label>
        <input
          type="text"
          class="form-control"
          name="product_code"
          id="product_code"
          value="{{ $databasic->product_code }}"
        />
      </div>
      <div class="mb-3">
        <label for="product_name" class="form-label">product_name</label>
        <input
          type="text"
          class="form-control"
          name="product_name"
          id="product_name"
          value="{{ $databasic->product_name }}"
        />
      </div>
      <div class="mb-3">
        <label for="company" class="form-label">company</label>
        <input
          type="text"
          class="form-control"
          name="company"
          id="company"
          value="{{ $databasic->company }}"
        />
      </div>
      <div class="mb-3">
        <label for="group_name" class="form-label">group_name</label>
        <input
          type="text"
          class="form-control"
          name="group_name"
          id="group_name"
          value="{{ $databasic->group_name }}"
        />
      </div>
      <div class="mb-3">
        <label for="category_name" class="form-label">category_name</label>
        <input
          type="text"
          class="form-control"
          name="category_name"
          id="category_name"
          value="{{ $databasic->category_name }}"
        />
      </div>
      <div class="mb-3">
        <label for="subcategory_name" class="form-label">subcategory_name</label>
        <input
          type="text"
          class="form-control"
          name="subcategory_name"
          id="subcategory_name"
          value="{{ $databasic->subcategory_name }}"
        />
      </div>
      <div class="mb-3">
        <label for="unit_name" class="form-label">unit_name</label>
        <input
          type="text"
          class="form-control"
          name="unit_name"
          id="unit_name"
          value="{{ $databasic->unit_name }}"
        />
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">quantity</label>
        <input
          type="number"
          class="form-control"
          name="quantity"
          id="quantity"
          value="{{ $databasic->quantity }}"
        />
      </div>
      <div class="mb-3">
        <label for="unit_price" class="form-label">unit_price</label>
        <input
          type="number"
          class="form-control"
          name="unit_price"
          id="unit_price"
          value="{{ $databasic->unit_price }}"
        />
      </div>
      <div class="mb-3">
        <label for="value" class="form-label">value</label>
        <input
          type="number"
          class="form-control"
          name="value"
          id="value"
          value="{{ $databasic->value }}"
        />
      </div>
      <button type="submit" class="btn btn-primary bg-darkblue"
        >Submit</button
      >
    </form>
  </div>
</div>
@endsection