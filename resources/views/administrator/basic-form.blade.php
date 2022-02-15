@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Basic Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-6">
    <form action="/insertbasic" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="product_code" class="form-label">product_code</label>
        <input
          type="text"
          class="form-control"
          name="product_code"
          id="product_code"
        />
      </div>
      <div class="mb-3">
        <label for="product_name" class="form-label">product_name</label>
        <input
          type="text"
          class="form-control"
          name="product_name"
          id="product_name"
        />
      </div>
      <div class="mb-3">
        <label for="class_name" class="form-label">company</label>
        <input
          type="text"
          class="form-control"
          name="company"
          id="class_name"
        />
      </div>
      <div class="mb-3">
        <label for="group_name" class="form-label">group_name</label>
        <input
          type="text"
          class="form-control"
          name="group_name"
          id="group_name"
        />
      </div>
      <div class="mb-3">
        <label for="product_category" class="form-label">category_name</label>
        <input
          type="text"
          class="form-control"
          name="category_name"
          id="product_category"
        />
      </div>
      <div class="mb-3">
        <label for="subproduct_category" class="form-label">subcategory_name</label>
        <input
          type="text"
          class="form-control"
          name="subcategory_name"
          id="subproduct_category"
        />
      </div>
      <div class="mb-3">
        <label for="product_uom" class="form-label">unit_name</label>
        <input
          type="text"
          class="form-control"
          name="unit_name"
          id="product_uom"
        />
      </div>
      <div class="mb-3">
        <label for="quantity" class="form-label">quantity</label>
        <input
          type="number"
          class="form-control"
          name="quantity"
          id="quantity"
        />
      </div>
      <div class="mb-3">
        <label for="unit_price" class="form-label">unit_price</label>
        <input
          type="number"
          class="form-control"
          name="unit_price"
          id="unit_price"
        />
      </div>
      <div class="mb-3">
        <label for="value" class="form-label">value</label>
        <input
          type="number"
          class="form-control"
          name="value"
          id="value"
        />
      </div>
      <button type="submit" class="btn btn-primary bg-darkblue"
        >Submit</button
      >
    </form>
  </div>
</div>
@endsection