@extends('user.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      <a href="/staff/products">
        Product
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
    <h1 class="h3 mb-0 text-white">Edit Product Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/staff/products/{{ $product->id }}">
      @method('put')
      @csrf
      <div class="row">
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="product_code" class="form-label">Product Code</label>
            <input
              type="text"
              class="form-control @error('product_code') is-invalid @enderror"
              name="product_code"
              id="product_code"
              value="{{ old('product_code', $product->product_code) }}"
              readonly
            />
            @error('product_code')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
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
          <div class="form-group mb-3">
            <label for="company" class="form-label">Company</label>
            <select
              name="user_id"
              class="form-select"
              required
              aria-readonly="true">
              <option selected>Choose Company</option>
              <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->company->company_name }}</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="product_class" class="form-label"
              >Product Class</label
            >
            <select
              name="group_id"
              class="form-select"
              aria-label="Default select example"
            >
              <option selected>Choose Class</option>
              <option value="{{ Auth::user()->company->group->id }}" selected>{{ Auth::user()->company->group->group_name }}</option>
            </select>
          </div>
          <div class="form-group d-none mb-3">
            <label for="class" class="form-label">Class</label>
            <input
              type="text"
              class="form-control @error('class') is-invalid @enderror"
              name="class"
              id="class"
              value="{{ Auth::user()->company->group->group_name }}"
              readonly
            />
            @error('class')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group d-none mb-3">
            <label for="company" class="form-label">Company</label>
            <input
              type="text"
              class="form-control @error('company') is-invalid @enderror"
              name="company"
              id="company"
              value="{{ Auth::user()->company->company_name }}"
              readonly
            />
          </div>

        </div>
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="category" class="form-label">Product Category</label>
            <select class="form-control form-select category-select" name="category_id" id="category">
              <option hidden>Choose Category</option>
              @foreach ($categories as $category)
                @if (old('category_id', $product->subcategory->category_id) == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group d-none mb-3">
            <label for="category" class="form-label">Category</label>
            <input
              type="text"
              class="form-control @error('category') is-invalid @enderror"
              name="category"
              id="category-read"
              value="{{ old('category', $product->category) }}"
              readonly
            />
          </div>
          <div class="form-group mb-3">
            <label for="subcategory" class="form-label">Product Subcategory</label>
            <select class="form-control form-select subcategory-select" name="subcategory_id" id="subcategory">
              <option hidden>Choose Subategory</option>
              @foreach ($subcategories as $subcategory)
                @if (old('category_id', $product->subcategory->id) == $subcategory->id)
                  <option value="{{ $subcategory->id }}" selected>{{ $subcategory->subcategory_name }}</option>
                @else
                  <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                @endif
              @endforeach
            </select>
          </div>
          {{-- <div class="form-group mb-3">
            <label for="subcategory" class="form-label d-block">Product Subcategory</label>
            <select class="form-control form-select subcategory-select @error('subcategory') is-invalid @enderror" name="subcategory_id" id="subcategory"></select>
            @error('subcategory')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div> --}}
          <div class="form-group mb-3">
            <label for="product_unit" class="form-label">Product Unit</label>
            <select
              name="unit_id"
              class="form-control form-select unit-select"
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
          <div class="form-group mb-3">
            <label for="unit_price" class="form-label">Unit Price</label>
            <input
              type="number"
              class="input form-control @error('unit_price') is-invalid @enderror"
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
          <button type="submit" class="btn btn-primary bg-darkblue ms-3 float-end">Update</button>
          <a href="/staff/products" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    // $('#category').load('change', function() {
    //   var categoryID = $(this).val();
    //   if(categoryID) {
    //       $.ajax({
    //           url: '/getSubCategory/'+categoryID,
    //           type: "GET",
    //           data : {"_token":"{{ csrf_token() }}"},
    //           dataType: "json",
    //           success:function(data)
    //           {
    //             if(data){
    //                 $('#subcategory').empty();
    //                 $.each(data, function(key, subcategory){
    //                     $('select[name="subcategory_id"]').append('<option value="'+ key + + subcategory.id +'">' + subcategory.subcategory_name+ '</option>');
    //                 });
    //             }else{
    //                 $('#subcategory').empty();
    //             }
    //         }
    //       });
    //   }else{
    //     $('#subcategory').empty();
    //   }
    // });

    // $('#category').on('change', function() {4
    //   var categoryID = $(this).val();
    //   alert(categoryID);
    //   if(categoryID) {
    //       $.ajax({
    //           url: '/getSubCategory/'+categoryID,
    //           type: "GET",
    //           data : {"_token":"{{ csrf_token() }}"},
    //           dataType: "json",
    //           success:function(data)
    //           {
    //             if(data){
    //                 $('#subcategory').empty();
    //                 $('#subcategory').append('<option hidden>Choose Subcategory</option>'); 
    //                 $.each(data, function(key, subcategory){
    //                     $('select[name="subcategory_id"]').append('<option value="'+ key + + subcategory.id +'">' + subcategory.subcategory_name+ '</option>');
    //                 });
    //             }else{
    //                 $('#subcategory').empty();
    //             }
    //         }
    //       });
    //   }else{
    //     $('#subcategory').empty();
    //   }
    // });

    $(".category-select").on("input", function () {
      var $variable = $('#category option:selected').html();
      document.getElementById("category-read").value = $variable;
    });

    $('.category-select').select2({
      theme: "bootstrap-5",
    });
    $('.subcategory-select').select2({
      theme: "bootstrap-5",
    });
    $('.unit-select').select2({
      theme: "bootstrap-5",
    });
  });
</script>
@endsection