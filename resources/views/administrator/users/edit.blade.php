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
      <a href="/administrator/users">
        User
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
    <h1 class="h3 mb-0 text-white">Edit User Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/users/{{ $user->id }}">
      @method('put')
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="form-group mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="username" class="form-label">{{ __('Username') }}</label>

                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="name" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <div class="form-group mb-3">
            <label for="company" class="form-label">{{ __('Company') }}</label>
              <select
                name="company_id"
                class="form-select"
                id="company"
                required>
                <option value="">Choose Company</option>
                @foreach ($companies as $company)
                  @if (old('company_id', $user->company_id) == $company->id)
                    <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option>
                  @else
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                  @endif
                @endforeach
              </select>
          </div>

          <div class="form-group mb-3">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>

                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone" autofocus>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <div class="row d-none mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

            <div class="col-md-6">
                <select
                  name="role"
                  class="form-select"
                  id="role"
                  required>
                  <option value="user">User</option>
                </select>
            </div>
          </div>

          <div class="form-group mb-3">
              <label for="email" class="form-label">{{ __('Email Address') }}</label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          <div class="row d-none mb-3">
              <label for="password" class="form-label">{{ __('Password') }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="row d-none mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password', $user->password) }}" required autocomplete="new-password">
              </div>
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Update</button>
          <a href="/administrator/users" class="btn btn btn-light float-end">Cancel</a>


        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#category").change(function(){
      $("#subcategoryview").removeClass("d-none");
    });

    $('#category').on('change', function() {
      var categoryID = $(this).val();
      if(categoryID) {
          $.ajax({
              url: '/getSubCategory/'+categoryID,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data) {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="">Choose product subcategory</option>'); 
                    $.each(data, function(key, subcategory){
    
                      $('select[name="subcategory_id"]').append('<option value="'+ subcategory.id +'">' + subcategory.subcategory_name+ '</option>');
                    });
                }else {
                    $('#subcategory').empty();
                }
            }
          });
      }else{
        $('#subcategory').empty();
      }
    });

    $(".category").on("input", function () {
      var $variable = $('#category option:selected').html();
      document.getElementById("category-read").value = $variable;
    });

    $(".input").on("input", function () {
      var x = document.getElementById("quantity").value;
      x = parseFloat(x);

      var y = document.getElementById("unit_price").value;
      y = parseFloat(y);

      document.getElementById("value").value = x * y;
    });
  });
</script>

@endsection