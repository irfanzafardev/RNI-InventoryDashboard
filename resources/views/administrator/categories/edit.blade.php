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
      <a href="/administrator/categories">
        Category
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
    <h1 class="h3 mb-0 text-white">Edit Category Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/categories/{{ $category->id }}">
      @method('put')
      @csrf
      <div class="row">
        <div class="col-5">
          <div class="form-group mb-3">
            <label for="category" class="form-label">Category Name</label>
            <input
              type="text"
              class="form-control @error('category') is-invalid @enderror"
              name="category_name"
              id="category"
              placeholder="Enter category name"
              value="{{ old('category_name', $category->category_name) }}"
              required
            />
            @error('category')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="group" class="form-label">Product Class</label>
            <select 
            class="form-control form-select @error('group') is-invalid @enderror" 
            name="group_id" 
            id="group" 
            required>
              <option value="">Choose product class</option>
              @foreach ($groups as $group)
                @if (old('group_id', $category->group_id) === $group->id)
                <option value="{{ $group->id }}" selected>{{ $group->group_name }}</option>
                @else
                <option value="{{ $group->id }}">{{ $group->group_name }}</option>              
                @endif
              @endforeach
            </select>
            @error('group')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Submit</button>
          <a href="/administrator/categories" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection