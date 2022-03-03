@extends('administrator.layouts.main')

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Update Stock Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/stocks/{{ $stock->id }}">
      @method('put')
      @csrf
      <div class="row">
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="stock_code" class="form-label">Stock Code</label>
            <input
              type="text"
              class="form-control @error('stock_code') is-invalid @enderror"
              name="stock_code"
              id="stock_code"
              value="{{ old('stock_code', $stock->stock_code) }}"
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
              value="{{ old('date', $stock->date) }}"
            />
            <input type="text" class="mt-3 d-none" id="datepickerAdmin" value="{{ old('date', $stock->date) }}" name="datepicker"
            style="
            width: 100%;
            padding: 6px 12px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;">

            @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="product_id" class="form-label">Product Name</label>
            <select
              name="product_id"
              class="form-control form-select"
              id="product_id">
              <option value="">Choose product</option>
              @foreach ($products as $product)
                @if (old('product_id', $stock->product_id) == $product->id)
                  <option value="{{ $product->id }}" selected>{{ $product->product_name }}</option>
                @else
                  <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="unit_price" class="form-label">Unit Price (Rp)</label>
            <input type="number" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" id="unit_price" value="{{ old('unit_price', $stock->product->unit_price) }}" readonly/>
            @error('unit_price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="quantity" class="form-label">Quantity</label>
              
              <input type="number" class="input form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity', $stock->quantity) }}"  placeholder="Enter product quantity" />
            @error('quantity')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="value" class="form-label">Value (Rp)</label>
            <input type="number" class="input form-control @error('value') is-invalid @enderror" name="value" id="value" value="{{ old('product_name', $stock->value) }}" readonly/>
            @error('value')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Submit</button>
          <a href="/administrator/stocks" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $('#product_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'GET',
        data : {"_token":"{{ csrf_token() }}"},
        dataType: 'json',
        success: function(response)
        {
            if(response){
              $('#unit_price').val(response.unit_price);
              $('#class').val(response.class);
              $('#company').val(response.company);
            } 
        }
    });
  });

  $(".input").on("input", function () {
      var x = document.getElementById("quantity").value;
      x = parseFloat(x);

      var y = document.getElementById("unit_price").value;
      y = parseFloat(y);

      document.getElementById("value").value = x * y;
  });
</script>

@endsection